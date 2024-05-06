<!DOCTYPE html>
<html lang="en">

    <?php loadPartial('head'); ?>


    <body class="bg-gray-100">

        <?php loadPartial('navbar'); ?>
        <?php loadPartial('showcase-search'); ?>
        <?php loadPartial('top-banner'); ?>

        <!-- Internship List -->
        <section>
            <div class="container mx-auto p-4 mt-4">
                <div class="text-center text-3xl mb-4 font-bold border border-gray-300 p-3">Latest Internships</div>
                <!-- Internship list specific content, adjust as needed -->

                <!-- Internship list -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">

                    <?php foreach ($listings as $listing) : ?>
                        <!-- Internship Position 1: Software Development Intern -->
                        <div class="rounded-lg shadow-md bg-white">
                            <div class="p-4">
                                <h2 class="text-xl font-semibold"><?= $listing['title'] ?></h2>
                                <p class="text-gray-700 text-lg mt-2">
                                    <?= $listing['description'] ?>
                                </p>
                                <ul class="my-4 bg-gray-100 p-4 rounded">
                                    <li class="mb-2"><strong>Salary:</strong> <?= $listing['salary'] ?></li>
                                    <li class="mb-2"><strong>Location:</strong> <?= $listing['address'] ?></li>
                                    <li class="mb-2"><strong>Tags:</strong> <span><?= $listing['tags'] ?></span></li>
                                </ul>
                                <a href="/public/listing/<?= $listing['id'] ?>" class="block w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium text-indigo-700 bg-indigo-100 hover:bg-indigo-200">View Details</a>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <!-- Internship Position 1: Software Development Intern -->
                    <div class="rounded-lg shadow-md bg-white">
                        <div class="p-4">
                            <h2 class="text-xl font-semibold">Software Development Intern</h2>
                            <p class="text-gray-700 text-lg mt-2">
                                We are looking for a software development intern to participate in the development of
                                high-quality software solutions.
                            </p>
                            <ul class="my-4 bg-gray-100 p-4 rounded">
                                <li class="mb-2"><strong>Salary:</strong> Negotiable</li>
                                <li class="mb-2"><strong>Location:</strong> On Campus</li>
                                <li class="mb-2"><strong>Tags:</strong> <span>Development</span>,
                                    <span>Programming</span></li>
                            </ul>
                            <a href="details.html" class="block w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium text-indigo-700 bg-indigo-100 hover:bg-indigo-200">
                                Details
                            </a>
                        </div>
                    </div>


                </div>
                <a href="/public/listings" class="block text-xl text-center">
                    <i class="fa fa-arrow-alt-circle-right"></i>
                    View All Internships
                </a>

                <?php loadPartial('bottom-banner'); ?>
                <?php loadPartial('footer'); ?>

            </div>
        </section>
    </body>
</html>