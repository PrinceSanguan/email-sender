<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Sender</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold text-gray-800 mb-2">Email Campaign Manager</h1>
            <p class="text-gray-600">Streamline your email campaign process</p>
        </div>

        <!-- Main Content -->
        <div class="max-w-3xl mx-auto">
            <!-- Form Card -->
            <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
                <form class="space-y-4">
                    <!-- Email Select -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-medium">Email</span>
                        </label>
                        <select class="select select-bordered w-full" disabled>
                            <option>choros.io</option>
                        </select>
                    </div>

                    <!-- Sequence Select -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-medium">Sequence</span>
                        </label>
                        <select class="select select-bordered w-full">
                            <option disabled selected>--select--</option>
                            <option>Email 1: Introduction – You're Invited</option>
                            <option>2. Quick Follow-Up – RE: Beta Invitation</option>
                            <option>3. Social Proof – Real Results</option>
                            <option>4. Final Call – Last Chance</option>
                        </select>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        <button class="btn btn-primary flex-1">Send</button>
                        <button class="btn btn-secondary flex-1">Import Data</button>
                    </div>
                </form>
            </div>

            <!-- Table Card -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="overflow-x-auto">
                    <table class="table table-zebra w-full">
                        <!-- head -->
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Sequence</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Sample data - This will be populated dynamically -->
                            <tr>
                                <td>John Doe</td>
                                <td>john@example.com</td>
                                <td>Email 1: Introduction</td>
                                <td><span class="badge badge-success">Sent</span></td>
                            </tr>
                            <tr>
                                <td>Jane Smith</td>
                                <td>jane@example.com</td>
                                <td>2. Quick Follow-Up</td>
                                <td><span class="badge badge-success">Sent</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>