<template>
    <div class="bg-white">
        <header class="absolute inset-x-0 top-0 z-30 bg-blue-400 flex justify-between items-center p-4 shadow-md">
            <div class="flex lg:flex-1">
                <h1 class="text-3xl sm:text-5xl tracking-tight text-gray-900 ml-4">
                    This is the Testing Dashboard
                </h1>
            </div>
            <nav class="flex items-center justify-end" aria-label="Global">
                <div class="space-y-3 text-right mr-4">
                    <a href="/" class="block rounded-lg px-4 py-2 text-base font-semibold leading-7 text-white bg-blue-500 hover:bg-blue-600 transition duration-200">Home</a>
                </div>
            </nav>
        </header>

        <div class="relative isolate px-6 pt-16 lg:px-8">
            <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56">
                <div class="text-center">
                    <p class="mt-6 text-lg text-gray-800">
                        <span class="inline-block p-4 bg-blue-500 text-white rounded-lg shadow-lg">
                            This is where you get started on your testing
                        </span>
                    </p>

                

                    <div class="mt-6 flow-root">
                        <div class="-my-6 divide-y divide-gray-500/10">
                            <div class="space-y-5 py-9">
                                <a href="#" class="block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 bg-blue-300 hover:bg-blue-400 transition duration-200">Simulation</a>
                                <a href="#" class="block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 bg-blue-300 hover:bg-blue-400 transition duration-200">Settings</a>
                                <a href="#" class="block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 bg-blue-300 hover:bg-blue-400 transition duration-200">History</a>
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
            message: 'Hello Vue!' // This is the message you want to display
        };
    }
}
</script>

<style scoped>
/* Add any scoped CSS styles here if needed */
</style>
