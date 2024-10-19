<template>
    <header class="flex justify-between items-center p-6 bg-gray-800 shadow-lg text-white">
        <!-- Left Button: Back -->
        <a href="/dashboard" class="bg-blue-600 px-4 py-2 rounded-lg hover:bg-blue-500 transition">Back</a>

        <!-- Title -->
        <h1 class="text-2xl font-semibold">Simulation Dashboard</h1>

        <!-- Right Button: Home -->
        <a href="/" class="bg-blue-600 px-4 py-2 rounded-lg hover:bg-blue-500 transition">Home</a>
    </header>

    <div class="flex justify-between p-6 bg-gray-900 min-h-screen text-white">
        <!-- Left Side: Past Simulations -->
        <div class="w-1/3 p-4 border-r border-gray-600">
            <h2 class="text-lg font-bold text-blue-300 mb-4 text-center">Past Simulations</h2>
            <div class="bg-gray-800 shadow-lg rounded-lg p-4">
                <h3 class="text-md font-semibold text-center mb-4">LEAD ACID BATTERY TESTING RESULT</h3>
                <table class="min-w-full border border-gray-600">
                    <thead>
                        <tr class="bg-gray-700">
                            <th class="border px-4 py-2 text-left">Start Time</th>
                            <th class="border px-4 py-2 text-left">End Time</th>
                            <th class="border px-4 py-2 text-left">Frequency (Hz)</th>
                            <th class="border px-4 py-2 text-left">Amplitude</th>
                            <th class="border px-4 py-2 text-left">Speed (m/s)</th>
                            <th class="border px-4 py-2 text-left">Duration</th>
                            <th class="border px-4 py-2 text-left">Battery Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="simulation in pastSimulations"
                            :key="simulation.id"
                            @click="selectSimulation(simulation)"
                            class="cursor-pointer hover:bg-gray-600 transition"
                        >
                            <td class="border px-4 py-2">{{ simulation.startTime }}</td>
                            <td class="border px-4 py-2">{{ simulation.endTime }}</td>
                            <td class="border px-4 py-2">{{ simulation.frequency }}</td>
                            <td class="border px-4 py-2">{{ simulation.amplitude }}</td>
                            <td class="border px-4 py-2">{{ simulation.speed }}</td>
                            <td class="border px-4 py-2">{{ formatDuration(simulation.duration) }}</td>
                            <td class="border px-4 py-2">{{ simulation.batteryName }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Centered Side: Selected Simulation -->
        <div class="flex flex-col w-1/3 p-4 items-center">
            <h2 class="text-lg font-bold text-blue-300 mb-4 text-center">Selected Simulation</h2>
            <div v-if="selectedSimulation" class="bg-gray-800 shadow-lg rounded-lg p-4 mb-4">
                <h3 class="font-semibold text-md">You selected: <span class="text-blue-400">{{ selectedSimulation.batteryName }}</span></h3>
                <p><strong>Start Time:</strong> {{ selectedSimulation.startTime }}</p>
                <p><strong>End Time:</strong> {{ selectedSimulation.endTime }}</p>
                <p><strong>Frequency:</strong> {{ selectedSimulation.frequency }} Hz</p>
                <p><strong>Amplitude:</strong> {{ selectedSimulation.amplitude }}</p>
                <p><strong>Speed:</strong> {{ selectedSimulation.speed }} m/s</p>
                <p><strong>Duration:</strong> {{ formatDuration(selectedSimulation.duration) }}</p>
                <div class="mt-4 flex justify-center space-x-2">
                    <button @click="deleteSimulation" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-500 transition">Delete</button>
                    <button @click="unselectSimulation" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-500 transition">Unselect</button>
                    <button @click="useSimulation" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-500 transition">Use</button>
                </div>
            </div>
            <div v-else class="text-gray-400 text-center mb-4">No simulation selected.</div>
        </div>

        <!-- Right Side: Deleted Simulations -->
        <div class="w-1/3 p-4">
            <h2 class="text-lg font-bold text-blue-300 mb-4 text-center">Deleted Simulations</h2>
            <div v-if="showDeleted" class="bg-gray-800 shadow-lg rounded-lg p-4">
                <ul>
                    <li v-for="deleted in deletedSimulations" :key="deleted.id" class="flex justify-between items-center py-2 border-b border-gray-600">
                        <span>{{ deleted.batteryName }}</span>
                    </li>
                </ul>

                <!-- Buttons for actions -->
                <div class="mt-4 flex justify-center space-x-4">
                    <button 
                        v-for="deleted in deletedSimulations" 
                        :key="deleted.id" 
                        @click="retrieveSimulation(deleted)" 
                        class="bg-green-600 text-white px-2 py-1 rounded-lg hover:bg-green-500 transition"
                    >
                        Retrieve
                    </button>
                    <button 
                        v-for="deleted in deletedSimulations" 
                        :key="deleted.id" 
                        @click="permanentlyDeleteSimulation(deleted)" 
                        class="bg-red-700 text-white px-2 py-1 rounded-lg hover:bg-red-600 transition"
                    >
                        Delete Permanently
                    </button>
                </div>
            </div>
            <button @click="showDeletedSimulations" class="mt-6 w-full bg-yellow-600 text-white px-4 py-2 rounded-lg hover:bg-yellow-500 transition">Toggle Deleted Simulations</button>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            pastSimulations: [
                { id: 1, startTime: '2024-10-10 10:00', endTime: '2024-10-10 18:30', frequency: 50, amplitude: 1.5, speed: 2.0, duration: 30000, batteryName: '12N12' },
                { id: 2, startTime: '2024-10-11 11:00', endTime: '2024-10-12 00:30', frequency: 60, amplitude: 2.0, speed: 2.5, duration: 81000, batteryName: '12N12-3B' },
                { id: 3, startTime: '2024-10-12 09:15', endTime: '2024-10-12 19:45', frequency: 55, amplitude: 1.8, speed: 2.2, duration: 37800, batteryName: '12N12-4B' },
                { id: 4, startTime: '2024-10-13 08:00', endTime: '2024-10-14 02:30', frequency: 70, amplitude: 2.5, speed: 2.0, duration: 63000, batteryName: '12N12-5B' },
                { id: 5, startTime: '2024-10-14 10:00', endTime: '2024-10-14 20:00', frequency: 50, amplitude: 1.5, speed: 2.1, duration: 36000, batteryName: '12N12-6B' },
                { id: 6, startTime: '2024-10-15 15:00', endTime: '2024-10-15 23:15', frequency: 65, amplitude: 1.9, speed: 2.3, duration: 49500, batteryName: '12N12-7B' },
                { id: 7, startTime: '2024-10-16 12:30', endTime: '2024-10-17 03:00', frequency: 75, amplitude: 2.2, speed: 2.6, duration: 88500, batteryName: '12N12-8B' },
            ],
            selectedSimulation: null,
            deletedSimulations: [],
            showDeleted: false,
        };
    },
    methods: {
        selectSimulation(simulation) {
            this.selectedSimulation = simulation;
        },
        deleteSimulation() {
            if (this.selectedSimulation) {
                this.deletedSimulations.push(this.selectedSimulation); // Store deleted simulation
                this.pastSimulations = this.pastSimulations.filter(sim => sim.id !== this.selectedSimulation.id); // Remove from past simulations
                this.selectedSimulation = null; // Reset selected simulation
            }
        },
        unselectSimulation() {
            this.selectedSimulation = null; // Reset selected simulation
        },
        useSimulation() {
            alert(`Using ${this.selectedSimulation.batteryName}`);
        },
        formatDuration(duration) {
            const hours = Math.floor(duration / 3600);
            const minutes = Math.floor((duration % 3600) / 60);
            const seconds = duration % 60;
            return `${hours}h ${minutes}m ${seconds}s`;
        },
        showDeletedSimulations() {
            this.showDeleted = !this.showDeleted; // Toggle deleted simulations display
        },
        retrieveSimulation(deleted) {
            this.pastSimulations.push(deleted); // Retrieve the deleted simulation
            this.deletedSimulations = this.deletedSimulations.filter(sim => sim.id !== deleted.id);
        },
        permanentlyDeleteSimulation(deleted) {
            this.deletedSimulations = this.deletedSimulations.filter(sim => sim.id !== deleted.id); // Permanently delete
        },
    },
};
</script>

<style scoped>
/* Add your custom styles here */
</style>
