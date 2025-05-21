@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-900 to-gray-800 text-gray-100">
    <div class="container mx-auto px-4 py-12">
        <!-- Hero Section -->
        <div class="relative mb-16">
            <!-- Background Pattern -->
            <div class="absolute inset-0 bg-cyan-600/5 rounded-3xl overflow-hidden">
                <div class="absolute -top-24 -right-24 w-64 h-64 bg-cyan-600/10 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-cyan-600/10 rounded-full blur-3xl"></div>
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full h-32 bg-gradient-to-r from-cyan-600/0 via-cyan-600/10 to-cyan-600/0 blur-2xl"></div>
            </div>
            
            <div class="relative flex flex-col md:flex-row items-center gap-8 p-8 md:p-12 rounded-3xl">
                <!-- Profile Image -->
                <div class="relative">
                    <div class="absolute inset-0 -m-3 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-full blur-md opacity-70"></div>
                    <div class="relative w-40 h-40 md:w-48 md:h-48 rounded-full overflow-hidden border-4 border-gray-800 shadow-xl">
                        <img 
                            src="https://codekhmerlearningg.vercel.app/img/hak.jpg" 
                            alt="Thy Muoyhak" 
                            class="w-full h-full object-cover"
                        >
                    </div>
                </div>
                
                <!-- Profile Info -->
                <div class="text-center md:text-left">
                    <h1 class="text-4xl md:text-5xl font-bold text-white mb-2">Thy Muoyhak</h1>
                    <div class="inline-flex items-center px-3 py-1 rounded-full bg-cyan-600/20 text-cyan-400 text-sm font-medium mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                        Web Developer, Designer, and Programmer
                    </div>
                    <p class="text-lg text-gray-300 max-w-2xl">
                        Hello! I'm Thy Muoyhak, a passionate web developer with a strong background in creating modern websites and applications. I specialize in frontend and backend development, ensuring seamless user experiences.
                    </p>
                    
                    <!-- Social Links -->
                    <div class="flex flex-wrap justify-center md:justify-start gap-3 mt-6">
                        <a href="mailto:thymuoyhak.biu@gmail.com" class="flex items-center gap-2 px-4 py-2 bg-gray-800/80 hover:bg-gray-700 rounded-lg transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                            Email
                        </a>
                        <a href="#" class="flex items-center gap-2 px-4 py-2 bg-gray-800/80 hover:bg-gray-700 rounded-lg transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                            </svg>
                            GitHub
                        </a>
                        <a href="#" class="flex items-center gap-2 px-4 py-2 bg-gray-800/80 hover:bg-gray-700 rounded-lg transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                            </svg>
                            LinkedIn
                        </a>
                        <a href="#" class="flex items-center gap-2 px-4 py-2 bg-gray-800/80 hover:bg-gray-700 rounded-lg transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                            Twitter
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- About Section -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-16">
            <!-- About Me -->
            <div class="lg:col-span-2">
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl border border-gray-700/50 shadow-xl overflow-hidden h-full">
                    <div class="p-6 border-b border-gray-700/50">
                        <h2 class="text-xl font-semibold text-white flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                            </svg>
                            About Me
                        </h2>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-300 mb-4">
                            I'm a passionate web developer with a strong background in creating modern websites and applications. I specialize in frontend and backend development, ensuring seamless user experiences. I am always eager to learn new technologies and create innovative solutions for users and businesses alike.
                        </p>
                        <p class="text-gray-300 mb-4">
                            With several years of experience in the field, I've had the opportunity to work on a variety of projects, from small business websites to complex web applications. My approach combines technical expertise with a keen eye for design, resulting in solutions that are both functional and visually appealing.
                        </p>
                        <p class="text-gray-300">
                            I believe in continuous learning and staying up-to-date with the latest trends and technologies in web development. This allows me to provide cutting-edge solutions that meet modern standards and expectations.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Quick Info -->
            <div class="lg:col-span-1">
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl border border-gray-700/50 shadow-xl overflow-hidden h-full">
                    <div class="p-6 border-b border-gray-700/50">
                        <h2 class="text-xl font-semibold text-white flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                            </svg>
                            Quick Info
                        </h2>
                    </div>
                    <div class="p-6">
                        <ul class="space-y-4">
                            <li class="flex items-start gap-3">
                                <div class="p-1.5 bg-cyan-600/20 text-cyan-400 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-white font-medium">Location</h3>
                                    <p class="text-gray-400">Cambodia</p>
                                </div>
                            </li>
                            <li class="flex items-start gap-3">
                                <div class="p-1.5 bg-cyan-600/20 text-cyan-400 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
                                        <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-white font-medium">Experience</h3>
                                    <p class="text-gray-400">1+ Years</p>
                                </div>
                            </li>
                            <li class="flex items-start gap-3">
                                <div class="p-1.5 bg-cyan-600/20 text-cyan-400 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-white font-medium">Education</h3>
                                    <p class="text-gray-400">Computer Science</p>
                                </div>
                            </li>
                            <li class="flex items-start gap-3">
                                <div class="p-1.5 bg-cyan-600/20 text-cyan-400 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
                                        <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-white font-medium">Available for</h3>
                                    <p class="text-gray-400">Freelance, Full-time</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Skills Section -->
        <div class="mb-16">
            <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl border border-gray-700/50 shadow-xl overflow-hidden">
                <div class="p-6 border-b border-gray-700/50">
                    <h2 class="text-xl font-semibold text-white flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd" />
                        </svg>
                        Skills & Expertise
                    </h2>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <!-- Frontend -->
                        <div class="bg-gray-800/50 rounded-lg p-5">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="p-2 bg-cyan-600/20 text-cyan-400 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-semibold text-white">Frontend</h3>
                            </div>
                            <ul class="space-y-2">
                                <li class="flex items-center gap-2 text-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-cyan-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    HTML, CSS, JavaScript
                                </li>
                                <li class="flex items-center gap-2 text-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-cyan-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    Bootstrap, Tailwind CSS
                                </li>
                                <li class="flex items-center gap-2 text-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-cyan-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    jQuery, React, Vue
                                </li>
                                <li class="flex items-center gap-2 text-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-cyan-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    Responsive Design
                                </li>
                            </ul>
                        </div>
                        
                        <!-- Backend -->
                        <div class="bg-gray-800/50 rounded-lg p-5">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="p-2 bg-cyan-600/20 text-cyan-400 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V5zm3.293 1.293a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 01-1.414-1.414L7.586 10 5.293 7.707a1 1 0 010-1.414zM11 12a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-semibold text-white">Backend</h3>
                            </div>
                            <ul class="space-y-2">
                                <li class="flex items-center gap-2 text-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-cyan-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    PHP, Laravel
                                </li>
                                <li class="flex items-center gap-2 text-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-cyan-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    Node.js, Express
                                </li>
                                <li class="flex items-center gap-2 text-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-cyan-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    RESTful APIs
                                </li>
                                <li class="flex items-center gap-2 text-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-cyan-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    Authentication & Security
                                </li>
                            </ul>
                        </div>
                        
                        <!-- Database -->
                        <div class="bg-gray-800/50 rounded-lg p-5">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="p-2 bg-cyan-600/20 text-cyan-400 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M3 12v3c0 1.657 3.134 3 7 3s7-1.343 7-3v-3c0 1.657-3.134 3-7 3s-7-1.343-7-3z" />
                                        <path d="M3 7v3c0 1.657 3.134 3 7 3s7-1.343 7-3V7c0 1.657-3.134 3-7 3S3 8.657 3 7z" />
                                        <path d="M17 5c0 1.657-3.134 3-7 3S3 6.657 3 5s3.134-3 7-3 7 1.343 7 3z" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-semibold text-white">Database</h3>
                            </div>
                            <ul class="space-y-2">
                                <li class="flex items-center gap-2 text-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-cyan-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    MySQL
                                </li>
                                <li class="flex items-center gap-2 text-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-cyan-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    MongoDB
                                </li>
                                <li class="flex items-center gap-2 text-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-cyan-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    Database Design
                                </li>
                                <li class="flex items-center gap-2 text-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-cyan-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    Query Optimization
                                </li>
                            </ul>
                        </div>
                        
                        <!-- Tools -->
                        <div class="bg-gray-800/50 rounded-lg p-5">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="p-2 bg-cyan-600/20 text-cyan-400 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-semibold text-white">Tools & Others</h3>
                            </div>
                            <ul class="space-y-2">
                                <li class="flex items-center gap-2 text-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-cyan-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    Git, GitHub
                                </li>
                                <li class="flex items-center gap-2 text-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-cyan-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    VS Code, PHPStorm
                                </li>
                                <li class="flex items-center gap-2 text-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-cyan-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    Docker, CI/CD
                                </li>
                                <li class="flex items-center gap-2 text-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-cyan-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    Agile Methodology
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Contact Section -->
        <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl border border-gray-700/50 shadow-xl overflow-hidden">
            <div class="p-6 border-b border-gray-700/50">
                <h2 class="text-xl font-semibold text-white flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                    </svg>
                    Get In Touch
                </h2>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <p class="text-gray-300 mb-6">
                            Feel free to connect with me if you want to discuss a project or simply have a chat about tech! I'm always open to new opportunities and collaborations.
                        </p>
                        <div class="space-y-4">
                            <div class="flex items-start gap-3">
                                <div class="p-2 bg-cyan-600/20 text-cyan-400 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-white font-medium">Email</h3>
                                    <a href="mailto:thymuoyhak.biu@gmail.com" class="text-cyan-400 hover:text-cyan-300 transition-colors">
                                        thymuoyhak.biu@gmail.com
                                    </a>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="p-2 bg-cyan-600/20 text-cyan-400 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-white font-medium">Phone</h3>
                                    <p class="text-gray-300">Available upon request</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <form class="space-y-4">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-300 mb-1">Your Name</label>
                                <input 
                                    type="text" 
                                    id="name" 
                                    name="name" 
                                    class="w-full px-4 py-2.5 bg-gray-900/70 border border-gray-700/50 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-transparent transition-all duration-200"
                                    placeholder="Enter your name"
                                >
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-300 mb-1">Your Email</label>
                                <input 
                                    type="email" 
                                    id="email" 
                                    name="email" 
                                    class="w-full px-4 py-2.5 bg-gray-900/70 border border-gray-700/50 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-transparent transition-all duration-200"
                                    placeholder="Enter your email"
                                >
                            </div>
                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-300 mb-1">Message</label>
                                <textarea 
                                    id="message" 
                                    name="message"
                                    rows="4"
                                    class="w-full px-4 py-2.5 bg-gray-900/70 border border-gray-700/50 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-transparent transition-all duration-200"
                                    placeholder="Enter your message"
                                ></textarea>
                            </div>
                            <button 
                                type="submit"
                                class="bg-cyan-600 hover:bg-cyan-700 text-white font-medium py-2.5 px-6 rounded-lg transition-all duration-200 shadow-lg shadow-cyan-900/20 flex items-center gap-2"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
                                </svg>
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Custom scrollbar for webkit browsers */
::-webkit-scrollbar {
    width: 8px;
    height: 8px;
}

::-webkit-scrollbar-track {
    background: rgba(31, 41, 55, 0.5);
    border-radius: 10px;
}

::-webkit-scrollbar-thumb {
    background: rgba(75, 85, 99, 0.5);
    border-radius: 10px;
}

::-webkit-scrollbar-thumb:hover {
    background: rgba(107, 114, 128, 0.5);
}

/* Smooth transitions */
.transition-all {
    transition-property: all;
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    transition-duration: 300ms;
}
</style>
@endsection