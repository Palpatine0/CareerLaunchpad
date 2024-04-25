<!DOCTYPE html>
<html lang="en">
    <?php loadPartial('head'); ?>
    <body class="bg-gray-100">

        <?php loadPartial('navbar'); ?>
        <?php loadPartial('showcase-search'); ?>
        <?php loadPartial('top-banner'); ?>


        <!-- Error Message -->
        <section>
            <div class="container mx-auto p-4 mt-4">
                <div class="text-center text-3xl mb-4 font-bold border border-gray-300 p-3">404 Error</div>
                <p class="text-center text-2xl mb-4">
                    This page does not exist
                </p>
                <div content="mt-5">ss</div>
                <?php loadPartial('bottom-banner'); ?>
                <?php loadPartial('footer'); ?>
            </div>
        </section>
    </body>
</html>