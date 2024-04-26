<?php loadPartial('head'); ?>
<?php loadPartial('navbar'); ?>
<?php loadPartial('top-banner'); ?>


    <!-- Internship Listings -->
    <section>
        <div class="container mx-auto p-4 mt-4">
            <div class="text-center text-3xl mb-4 font-bold border border-gray-300 p-3">All Internships</div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <!-- Example Internship Position -->
                <!-- Internship Position 1: Software Engineer -->
                <div class="rounded-lg shadow-md bg-white">
                    <div class="p-4">
                        <h2 class="text-xl font-semibold">Software Engineer</h2>
                        <p class="text-gray-700 text-lg mt-2">
                            We are looking for a skilled software engineer to develop high-quality software solutions.
                        </p>
                        <ul class="my-4 bg-gray-100 p-4 rounded">
                            <li class="mb-2"><strong>Salary:</strong> $8,000</li>
                            <li class="mb-2">
                                <strong>Location:</strong> Tempe
                                <span class="text-xs bg-blue-500 text-white rounded-full px-2 py-1 ml-2">On Campus</span>
                            </li>
                            <li class="mb-2">
                                <strong>Tags:</strong> <span>Development</span>, <span>Programming</span>
                            </li>
                        </ul>
                        <a href="details.html" class="block w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium text-indigo-700 bg-indigo-100 hover:bg-indigo-200">
                            Details
                        </a>
                    </div>
                </div>
                <!-- More internship positions can be added as needed -->
            </div>
        </div>
    </section>

<?php loadPartial('bottom-banner'); ?>
<?php loadPartial('footer'); ?>