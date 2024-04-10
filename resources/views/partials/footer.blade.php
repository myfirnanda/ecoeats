<footer class="mt-16 sticky top-full pt-10 pb-5 bg-green-800">
    <div class="container mx-auto">
        <div class="grid grid-cols-4 items-center pb-5">
            <div>
                <ul class="text-white">
                    <li class="mb-4">
                        <a href="">About Us</a>
                    </li>
                    <li class="mb-4">
                        <a href="">Contact Us</a>
                    </li>
                    <li class="mb-4">
                        <a href="">Shipping Policy</a>
                    </li>
                    <li class="mb-4">
                        <a href="">Refund Policy</a>
                    </li>
                    <li class="mb-4">
                        <a href="">Privacy Policy</a>
                    </li>
                    <li class="">
                        <a href="">Terms and Conditions</a>
                    </li>
                </ul>
            </div>
            <div class="col-span-2">
                <div class="w-full flex items-center gap-1 justify-center">
                    <a href="{{ route('homepage') }}" class="flex items-center my-5">
                        <h1 class="font-semibold text-white text-4xl">Eco</h1>
                        <img src="{{ asset('storage/homepage-images/logo.png') }}" alt="EcoEats Logo" width="55">
                        <h1 class="font-semibold text-white text-4xl">Eats</h1>
                    </a>
                </div>
                <p class="text-center text-white">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam doloribus ipsa modi accusantium placeat excepturi inventore nam ducimus ab culpa. Iste saepe porro odio. Sequi velit eum reiciendis necessitatibus modi?</p>
                <div class="flex justify-center text-white text-2xl gap-3 my-3">
                    <a href="">
                        <i class="uil uil-facebook-f"></i>
                    </a>
                    <a href="">
                        <i class="uil uil-instagram"></i>
                    </a>
                    <a href="">
                        <i class="uil uil-twitter"></i>
                    </a>
                    <a href="">
                        <i class="uil uil-youtube"></i>
                    </a>
                </div>
            </div>
            <div class="text-right text-white">
                <h4 class="text-xl font-semibold text-green-500">Get Latest News</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non cupiditate consequuntur numquam at, recusandae perspiciatis perferendis itaque corporis excepturi totam ratione repellendus quo ipsum nisi beatae tenetur culpa quaerat debitis.</p>
                <div class="flex">
                    <input type="email" name="" id="" placeholder="Your Email">
                    <button type="submit">Subscribe</button>
                </div>
            </div>
        </div>
        <hr>
        <p class="text-center text-white pt-5">&copy; Copyright @php echo date('Y') @endphp <a href="">Firnanda</a>. All rights reserved</p>
    </div>
</footer>