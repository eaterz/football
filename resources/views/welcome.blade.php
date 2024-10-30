<x-app-layout>
    <div class="w-[100%] h-[700px] relative overflow-hidden">
        <!-- Image Container -->
        <div class="image-container absolute top-0 left-0 w-full h-full overflow-hidden">
            <img id="currentImage" class="w-full h-full object-cover absolute" src="{{ asset('image-1.jpg') }}" alt="Image 1">
        </div>

        <!-- Overlay Text, positioned bottom-left -->
        <div id="imageText" class="absolute bottom-4 left-4 text-white text-2xl font-bold bg-opacity-50 px-4 py-2 rounded-lg">
            Diadora Veloce SL Made In Italy
        </div>

        <!-- Previous Button (Left side) -->
        <button id="prevButton" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white px-2 py-2 rounded-full hover:bg-opacity-75 transition-colors w-12 h-12 flex justify-center items-center">
            <img class="w-6 h-6 object-cover" src="back.png" alt="Back">
        </button>

        <!-- Next Button (Right side) -->
        <button id="nextButton" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white px-2 py-2 rounded-full hover:bg-opacity-75 transition-colors w-12 h-12 flex justify-center items-center">
            <img class="w-6 h-6 object-cover" src="forward.png" alt="Next">
        </button>
    </div>

    <div class="mt-16">
        <div class="flex flex-row gap-10 mt-12 mb-16 justify-items-center">
            @foreach($categories as $category)
                <a href="{{ route('products.show', $category->name) }}">
                <div class="flex flex-col items-center gap-4 transform transition-transform duration-300 hover:scale-110">
                    <!-- Image Container -->
                    <div class="flex justify-center items-center w-64 h-64 overflow-hidden rounded-full shadow-lg">
                        <img class="w-full h-full object-cover" src="{{ $category->image }}" alt="{{ $category->name }}">
                    </div>

                    <!-- Category Name -->
                    <div>
                        <h2 class="text-xl font-bold text-gray-800 mt-4 text-center">{{ $category->name }}</h2>
                    </div>
                </div>
                </a>
            @endforeach
        </div>
    </div>




    <script>
        // Image sources and associated text
        const images = [
            {
                src: "{{ asset('image-1.jpg') }}",
                text: "Diadora Veloce SL Made In Italy"
            },
            {
                src: "{{ asset('image-2.jpg') }}",
                text: "adidas Predator Tongue"
            }
        ];

        let currentIndex = 0;

        // Get the elements from the DOM
        const imageElement = document.getElementById('currentImage');
        const textElement = document.getElementById('imageText');
        const nextButton = document.getElementById('nextButton');
        const prevButton = document.getElementById('prevButton');

        // Function to smoothly slide to the next or previous image
        function changeImage(newIndex) {
            if (newIndex !== currentIndex) {
                const direction = newIndex > currentIndex ? 100 : -100;
                const newImage = document.createElement("img");

                // Set up the new image for sliding
                newImage.src = images[newIndex].src;
                newImage.classList.add("w-full", "h-full", "object-cover", "absolute");
                newImage.style.transition = "transform 0.5s ease";
                newImage.style.transform = `translateX(${direction}%)`;

                // Add the new image to the container
                imageElement.parentElement.appendChild(newImage);
                setTimeout(() => {
                    // Slide current and new images
                    imageElement.style.transition = "transform 0.5s ease";
                    imageElement.style.transform = `translateX(${-direction}%)`;
                    newImage.style.transform = "translateX(0)";

                    // After the transition, update the current image
                    setTimeout(() => {
                        imageElement.src = images[newIndex].src;
                        imageElement.style.transition = "";
                        imageElement.style.transform = "";
                        newImage.remove();
                        currentIndex = newIndex;
                        textElement.textContent = images[newIndex].text;
                    }, 500);
                }, 10);
            }
        }

        // Show the next image
        function showNextImage() {
            const newIndex = (currentIndex + 1) % images.length;
            changeImage(newIndex);
        }

        // Show the previous image
        function showPrevImage() {
            const newIndex = (currentIndex - 1 + images.length) % images.length;
            changeImage(newIndex);
        }

        // Attach event listeners to the buttons
        nextButton.addEventListener('click', showNextImage);
        prevButton.addEventListener('click', showPrevImage);
    </script>
</x-app-layout>
