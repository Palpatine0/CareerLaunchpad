<?php

use Framework\Session;

?>
<header class="text-white p-4" style="background-color: #ffffff;">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-3xl font-semibold">
            <a href="/public/"><img class="vert" src="https://www.asu.edu/modules/webspark/asu_brand/node_modules/@asu/component-header/dist/assets/img/arizona-state-university-logo-vertical.png" alt="Arizona State University" title="ASU home page" width="80" height="234" decoding="async" fetchpriority="high"></a>
            <!--<a href="index.html" style="color:#000;">Arizona State University</a>-->
        </h1>
        <nav class="space-x-4">


            //
            <?php if (Session::has('user')): ?>
                <div class="flex justify-between items-center gap-4">
                    <div style="color: #8d1c3f;font-weight: bold;margin-top: 2px">
                        Welcome, <?= Session::get('user')['name'] ?>
                    </div>
                    <form method="post" action="/public/auth/logout">
                        <button type="submit" class="text-white inline hover:underline" style="color: #8d1c3f;font-weight: bold">Logout</button>
                    </form>
                    <a href="/public/listings/publish" class="bg-yellow-500 hover:bg-yellow-600 text-black px-4 py-2 rounded hover:shadow-md transition duration-300">
                        <i class="fa fa-edit"></i> Post Listing
                    </a>
                </div>
            <?php else: ?>
                <a href="/public/auth/login" class=" hover:underline" style="color: #8d1c3f;font-weight: bold">Sign In</a>
                <a href="/public/auth/register" class=" hover:underline" style="color: #8d1c3f;font-weight: bold">Sign Up</a>
            <?php endif; ?>

        </nav>
    </div>
</header>