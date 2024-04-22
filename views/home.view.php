<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="https://cdn.bootcdn.net/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha384-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous"/>
        <link rel="stylesheet" href="css/style.css"/>
        <title>ASU Career Launchpad</title>
    </head>
    <body class="bg-gray-100">
        <!-- Navigation Bar -->
        <header class="bg-blue-900 text-white p-4">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-3xl font-semibold">
                    <a href="index.html">ASU Internship Website</a>
                </h1>
                <nav class="space-x-4">
                    <a href="login.html" class="text-white hover:underline">Login</a>
                    <a href="register.html" class="text-white hover:underline">Register</a>
                    <a href="post-job.html" class="bg-yellow-500 hover:bg-yellow-600 text-black px-4 py-2 rounded hover:shadow-md transition duration-300">
                        <i class="fa fa-edit"></i>
                        Post Internship
                    </a>
                </nav>
            </div>
        </header>

        <!-- Showcase Area -->
        <section class="showcase relative bg-cover bg-center bg-no-repeat h-72 flex items-center">
            <div class="overlay"></div>
            <div class="container mx-auto text-center z-10">
                <h2 class="text-4xl text-white font-bold mb-4">Find Your Dream Internship</h2>
                <form class="mb-4 block mx-5 md:mx-auto">
                    <input type="text" name="keywords" placeholder="Keywords" class="w-full md:w-auto mb-2 px-4 py-2 focus:outline-none/>
                    <input type=" text" name="location" placeholder="Location" class="w-full md:w-auto mb-2 px-4 py-2
                    focus:outline-none" />
                    <button
                            class="w-full md:w-auto bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 focus:outline-none"
                    >
                        <i class="fa fa-search"></i> Search
                    </button>
                </form>
            </div>
        </section>

        <!-- Top Banner -->
        <section class="bg-blue-900 text-white py-6 text-center">
            <div class="container mx-auto">
                <h2 class="text-3xl font-semibold">Unlock Your Career Potential</h2>
                <p class="text-lg mt-2">
                    Discover the perfect internship opportunities
                </p>
            </div>
        </section>

        <!-- Internship List -->
        <section>
            <div class="container mx-auto p-4 mt-4">
                <div class="text-center text-3xl mb-4 font-bold border border-gray-300 p-3">Latest Internships</div>
                <!-- Internship list specific content, adjust as needed -->

                <!-- Internship list -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
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

                    <!-- Internship Position 2: Data Analysis Intern -->
                    <div class="rounded-lg shadow-md bg-white">
                        <div class="p-4">
                            <h2 class="text-xl font-semibold">Data Analysis Intern</h2>
                            <p class="text-gray-700 text-lg mt-2">
                                Join our team as a data analysis intern, analyze and interpret data to gain insights.
                            </p>
                            <ul class="my-4 bg-gray-100 p-4 rounded">
                                <li class="mb-2"><strong>Salary:</strong> Negotiable</li>
                                <li class="mb-2"><strong>Location:</strong> On Campus</li>
                                <li class="mb-2"><strong>Tags:</strong> <span>Data Analysis</span>,
                                    <span>Statistics</span></li>
                            </ul>
                            <a href="details.html" class="block w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium text-indigo-700 bg-indigo-100 hover:bg-indigo-200">
                                Details
                            </a>
                        </div>
                    </div>

                    <!-- Internship Position 3: AI Research Assistant -->
                    <div class="rounded-lg shadow-md bg-white">
                        <div class="p-4">
                            <h2 class="text-xl font-semibold">AI Research Assistant</h2>
                            <p class="text-gray-700 text-lg mt-2">
                                Looking for a research assistant passionate about artificial intelligence to participate
                                in the research and development of cutting-edge AI technology.
                            </p>
                            <ul class="my-4 bg-gray-100 p-4 rounded">
                                <li class="mb-2"><strong>Salary:</strong> Negotiable</li>
                                <li class="mb-2"><strong>Location:</strong> On Campus</li>
                                <li class="mb-2"><strong>Tags:</strong> <span>Artificial Intelligence</span>, <span>Research</span>
                                </li>
                            </ul>
                            <a href="details.html" class="block w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium text-indigo-700 bg-indigo-100 hover:bg-indigo-200">
                                Details
                            </a>
                        </div>
                    </div>
                </div>
                <a href="listings.html" class="block text-xl text-center">
                    <i class="fa fa-arrow-alt-circle-right"></i>
                    View All Internships
                </a>


                <!-- Bottom Banner -->
                <section class="container mx-auto my-6">
                    <div
                            class="bg-blue-800 text-white rounded p-4 flex items-center justify-between"
                    >
                        <div>
                            <h2 class="text-xl font-semibold">Looking for Interns?</h2>
                            <p class="text-gray-200 text-lg mt-2">
                                Post your internship position now and find the ideal candidate.
                            </p>
                        </div>
                        <a
                                href="post-job.html"
                                class="bg-yellow-500 hover:bg-yellow-600 text-black px-4 py-2 rounded hover:shadow-md transition duration-300"
                        >
                            <i class="fa fa-edit"></i> Post Internship
                        </a>
                    </div>
                </section>