<template>
    <div class="bg-gray-100 min-h-screen"> <!-- Background color -->
        <header class="bg-blue-600 flex justify-between items-center p-4 shadow-md"> <!-- Header background -->
            <div class="flex lg:flex-1 items-center">
                <a href="/dashboard" class="text-white px-4 py-2 rounded-lg hover:bg-blue-500 transition duration-200">Back</a>
                <h1 class="text-3xl text-white font-bold mx-auto">Simulation</h1>
            </div>
            <nav class="flex items-center justify-end">
                <a href="/" class="text-white px-4 py-2 rounded-lg hover:bg-blue-500 transition duration-200">Home</a>
            </nav>
        </header>

        <div class="relative isolate px-6 pt-4 lg:px-8"> <!-- Reduced pt-10 to pt-4 -->
            <div class="max-w-2xl sm:py-4 lg:py-4"> <!-- Reduced py values to py-4 -->
                <div class="text-end ">
                    <p class="mt-2 text-lg text-gray-800"> <!-- Reduced mt-6 to mt-2 -->
                        <span class="inline-block p-4 bg-blue-500 text-white rounded-lg shadow-lg">
                            This is the simulation page where you begin testing your system.
                        </span>
                    </p>

                    <!-- New Heading for Sliders -->
                    <h2 class="mt-6 text-2xl font-bold text-gray-900 text-left">Control Parameters</h2> <!-- Reduced mt-10 to mt-6 -->

                    <!-- Outer Square -->
                    <div class="mt-4 p-6 rounded-lg bg-white shadow-lg border border-blue-400 max-w-md"> 
                        <div class="flex flex-col items-start"> 
                            <!-- Frequency Label Square -->
                            <div class="p-4 mb-4 border border-blue-400 rounded-lg bg-gray-200 w-full"> 
                                <label class="block text-base font-semibold leading-7 text-gray-900">Frequency (Hz)</label>
                            </div>

                            <!-- Slider for Frequency -->
                            <div class="p-4 border border-blue-400 rounded-lg bg-gray-200 w-full"> 
                                <input type="range" min="0" max="100" v-model="sliderValueFrequency" step="10" class="slider" aria-label="Frequency slider" />
                                <span class="text-blue-500">{{ sliderValueFrequency }} Hz</span>
                            </div>

                            <!-- Acceleration Label Square -->
                            <div class="p-4 mb-4 mt-8 border border-blue-400 rounded-lg bg-gray-200 w-full"> 
                                <label class="block text-base font-semibold leading-7 text-gray-900">Acceleration (m/s²)</label>
                            </div>

                            <!-- Slider for Acceleration -->
                            <div class="p-4 border border-blue-400 rounded-lg bg-gray-200 w-full"> 
                                <input type="range" min="0" max="100" v-model="sliderValueAcceleration" step="10" class="slider" aria-label="Acceleration slider" />
                                <span class="text-blue-500">{{ sliderValueAcceleration }} m/s²</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            sliderValueFrequency: 50, // Initial value for the frequency slider
            sliderValueAcceleration: 50 // Initial value for the acceleration slider
        };
    }
}
</script>

<style scoped>
/* Global Styles */
body {
    font-family: 'Roboto', sans-serif; /* Clean font */
}

/* Background color for the page */
.bg-gray-100 {
    background-color: #f7fafc; /* Light gray color for background */
}

/* Slider styles */
.slider {
    width: 100%;
    -webkit-appearance: none;
    appearance: none;
    height: 10px; /* Increased height for better visibility */
    background: #3b82f6; /* Inactive track color */
    border-radius: 5px;
}
.slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 24px; /* Adjust thumb width */
    height: 24px; /* Adjust thumb height */
    background: #1d4ed8; /* Thumb color */
    border-radius: 50%; /* Round thumb */
    box-shadow: 0 0 2px rgba(0,0,0,0.5); /* Shadow for thumb */
}
.slider::-moz-range-thumb {
    width: 24px; /* Adjust thumb width */
    height: 24px; /* Adjust thumb height */
    background: #1d4ed8; /* Thumb color */
    border-radius: 50%; /* Round thumb */
    box-shadow: 0 0 2px rgba(0,0,0,0.5); /* Shadow for thumb */
}
</style>
