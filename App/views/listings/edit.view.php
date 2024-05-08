<?php loadPartial('head'); ?>
<?php loadPartial('navbar'); ?>
<?php loadPartial('top-banner'); ?>

    <section class="flex justify-center items-center mt-20">
        <div class="bg-white p-8 rounded-lg shadow-md w-full md:w-600 mx-6">
            <h2 class="text-4xl text-center font-bold mb-4">Create Job Listing</h2>
            <form method="POST" action="/public/listings">
                <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">
                    Job Information
                </h2>
                <?php if (isset($errors)): ?>
                    <?php foreach ($errors as $error): ?>
                        <div class="message bg-red-100 my-3"><?= $error ?></div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <div class="mb-4">
                    <input type="text" name="title" placeholder="Job Title" class="w-full px-4 py-2 border rounded focus:outline-none" value="<?= isset($listing['title']) ? $listing['title'] : '' ?>"/>
                </div>
                <div class="mb-4">
                    <textarea name="description" placeholder="Job Description" class="w-full px-4 py-2 border rounded focus:outline-none" value="<?= isset($listing['description']) ? $listing['description'] : '' ?>"></textarea>
                </div>
                <div class="mb-4">
                    <input type="text" name="salary" placeholder="Annual Salary" class="w-full px-4 py-2 border rounded focus:outline-none" value="<?= isset($listing['salary']) ? $listing['salary'] : '' ?>"/>
                </div>
                <div class="mb-4">
                    <input type="text" name="requirements" placeholder="Requirements" class="w-full px-4 py-2 border rounded focus:outline-none" value="<?= isset($listing['requirements']) ? $listing['requirements'] : '' ?>"/>
                </div>
                <div class="mb-4">
                    <input type="text" name="benefits" placeholder="Benefits" class="w-full px-4 py-2 border rounded focus:outline-none" value="<?= isset($listing['benefits']) ? $listing['benefits'] : '' ?>"/>
                </div>

                <div class="mb-4">
                    <input type="text" name="tag" placeholder="Tag" class="w-full px-4 py-2 border rounded focus:outline-none" value="<?= isset($listing['tags']) ? $listing['tags'] : '' ?>"/>
                </div>

                <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">
                    Company Information & Location
                </h2>
                <div class="mb-4">
                    <input type="text" name="company" placeholder="Company Name" class="w-full px-4 py-2 border rounded focus:outline-none" value="<?= isset($listing['company']) ? $listing['company'] : '' ?>"/>
                </div>
                <div class="mb-4">
                    <input type="text" name="address" placeholder="Address" class="w-full px-4 py-2 border rounded focus:outline-none" value="<?= isset($listing['address']) ? $listing['address'] : '' ?>"/>
                </div>
                <div class="mb-4">
                    <input type="text" name="city" placeholder="City" class="w-full px-4 py-2 border rounded focus:outline-none" value="<?= isset($listing['city']) ? $listing['city'] : '' ?>"/>
                </div>
                <div class="mb-4">
                    <input type="text" name="state" placeholder="State" class="w-full px-4 py-2 border rounded focus:outline-none" value="<?= isset($listing['state']) ? $listing['state'] : '' ?>"/>
                </div>
                <div class="mb-4">
                    <input type="text" name="phone" placeholder="Phone" class="w-full px-4 py-2 border rounded focus:outline-none" value="<?= isset($listing['phone']) ? $listing['phone'] : '' ?>"/>
                </div>
                <div class="mb-4">
                    <input type="email" name="email" placeholder="Email to receive applications" class="w-full px-4 py-2 border rounded focus:outline-none" value="<?= isset($listing['email']) ? $listing['email'] : '' ?>"/>
                </div>
                <button class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3 rounded focus:outline-none">
                    Save
                </button>
                <a href="/" class="block text-center w-full bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded focus:outline-none">
                    Cancel
                </a>
            </form>
        </div>
    </section>

<?php loadPartial('bottom-banner'); ?>
<?php loadPartial('footer'); ?>