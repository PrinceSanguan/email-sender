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
                <form method="post" action="{{ route('send-email-template-one') }}" class="space-y-4">
                    @csrf
                
                    <!-- Email Sender Select -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-medium">Email Sender</span>
                        </label>
                        <select class="select select-bordered w-full" name="email-sender" required>
                            <option value="" disabled selected>--select--</option>
                            <option value="choros.io">choros.io</option>
                        </select>
                    </div>
                
                    <!-- Email Receiver -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-medium">Email Receiver</span>
                        </label>
                        <input type="email" placeholder="Enter the email" name="email-receiver" class="input input-bordered w-full" required>
                    </div>
                
                    <!-- Name -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-medium">Name</span>
                        </label>
                        <input type="text" placeholder="Enter the name" name="name" class="input input-bordered w-full" required>
                    </div>
                
                    <!-- Niche -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-medium">Niche</span>
                        </label>
                        <input type="text" placeholder="Enter the niche" name="niche" class="input input-bordered w-full" required>
                    </div>
                
                    <!-- Sequence Select -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-medium">Sequence</span>
                        </label>
                        <select class="select select-bordered w-full" name="sequence" required>
                            <option value="" disabled selected>--select--</option>
                            <option value="Email 1: Introduction – You're Invited">Email 1: Introduction – You're Invited</option>
                            <option value="2. Quick Follow-Up – RE: Beta Invitation">2. Quick Follow-Up – RE: Beta Invitation</option>
                            <option value="3. Social Proof – Real Results">3. Social Proof – Real Results</option>
                            <option value="4. Final Call – Last Chance">4. Final Call – Last Chance</option>
                        </select>
                    </div>
                
                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        <button type="submit" class="btn btn-primary flex-1">Send</button>
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
                                <th>Email sender</th>
                                <th>Email receiver</th>
                                <th>Sequence</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($scrapEmails)
                                @foreach ($scrapEmails as $scrapEmail)
                                    <tr>
                                        <td>{{$scrapEmail->name}}</td>
                                        <td>{{ $scrapEmail->{'email-sender'} }}</td>
                                        <td>{{ $scrapEmail->{'email-receiver'} }}</td>
                                        <td>{{$scrapEmail->sequence}}</td>
                                        <td><span class="badge badge-success">Sent</span></td>
                                    </tr>
                                @endforeach
                            @endif        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if(session('success'))
        Swal.fire({
            title: "Success!",
            text: "{{ session('success') }}",
            icon: "success",
            confirmButtonText: "OK",
        });
        @elseif(session('error'))
        Swal.fire({
            title: "Error!",
            text: "{{ session('error') }}",
            icon: "error",
            confirmButtonText: "OK",
        });
        @endif
    </script>
</body>
</html>