<?php

namespace Database\Factories;

use App\Http\Tools\NoGenerator;
use App\Http\Tools\SlugGenerator;
use App\Models\Categories;
use App\Models\News;
use App\Models\ResourcePlatforms;
use App\Models\Users;
use App\Models\UserTypes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $authors = [];
        foreach (Users::where("type", UserTypes::where("name", "author")->first()->no)->get() as $a ) {
            $authors[] = $a->no;
        }

        $editors = [];
        foreach (Users::where("type", UserTypes::where("name", "editor")->first()->no)->get() as $a ) {
            $editors[] = $a->no;
        }

        $categories = [];
        foreach (Categories::all() as $c) {
            $categories[] = $c->no;
        }

        $resourcePlatforms = [];
        foreach (ResourcePlatforms::all() as $rp) {
            $resourcePlatforms[] = $rp->no;
        }

        $no = NoGenerator::generateNewsNo();
        $title = $this->faker->sentence();

        $titleCheck = News::where(['title' => $title])->count();
        while ($titleCheck == 1) {
            $title = $this->faker->sentence();
            $titleCheck = News::where(['title' => $title])->count();
        }

        $content = $this->faker->paragraph();

        $contentCheck = News::where(['content' => $content])->count();
        while ($contentCheck == 1) {
            $content = $this->faker->paragraph();
            $contentCheck = News::where(['content' => $content])->count();
        }

        $author = $this->faker->randomElement($authors);
        $category = $this->faker->randomElement($categories);
        $resourcePlatform = $this->faker->randomElement($resourcePlatforms);
        $resourceUrl = NoGenerator::generateResourceUrlsNo();
        // $resourceUrl = $this->faker->domainName();
        $addedTime = $this->faker->dateTimeThisDecade();
        $publishStatus = $this->faker->randomElement(["task", "published", "planned"]);
        $publishDate = $publishStatus == "task" ? null : strtotime("-1 hours");
        $status = $this->faker->randomElement(["pending", "approved", "rejected"]);
        $slug = SlugGenerator::single($title);
        $isApproved = $status == "approved" ? true : false;
        $approvedAt = $isApproved ? $this->faker->dateTimeThisDecade() : null;
        $approvedBy = $isApproved ? $this->faker->randomElement($editors) : null;
        $isRejected = $status == "rejected" ? true : false;
        $rejectedAt = $isRejected ? $this->faker->dateTimeThisDecade() : null;
        $rejectedBy = $isRejected ? $this->faker->randomElement($editors) : null;
        $rejectedReason = $isRejected ? "it is rejected, because bla bla bla..." : null;

        return [
            "no" => $no,
            "title" => $title,
            "content" => $content,
            "author" => $author,
            "category" => $category,
            "resource_platform" => $resourcePlatform,
            "resource_url" => $resourceUrl,
            "added_time" => $addedTime,
            "publish_status" => $publishStatus,
            "publish_date" => $publishDate,
            "status" => $status,
            "slug" => $slug,
            "is_approved" => $isApproved,
            "approved_at" => $approvedAt,
            "approved_by" => $approvedBy,
            "is_rejected" => $isRejected,
            "rejected_at" => $rejectedAt,
            "rejected_by" => $rejectedBy,
            "rejected_reason" => $rejectedReason
        ];
    }
}
