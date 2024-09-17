<!doctype html>
<html lang="en-US">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>CME Attendance Confirmation</title>
    <meta name="description" content="CME Attendance Confirmation">
    <style>
        a:hover {
            text-decoration: underline !important;
        }

        /* Responsive Table */
        @media only screen and (max-width: 600px) {
            .responsive-table {
                width: 100% !important;
            }

            .responsive-table td {
                display: block;
                width: 100% !important;
                box-sizing: border-box;
                text-align: left;
            }

            .responsive-table td::before {
                content: attr(data-label);
                font-weight: bold;
                display: block;
                margin-bottom: 5px;
            }

            .responsive-table td:last-child {
                border-bottom: 0;
            }
        }
    </style>
</head>

<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
    <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
        style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: 'Open Sans', sans-serif;">
        <tr>
            <td>
                <table style="background-color: #f2f3f8; max-width:670px; margin:0 auto;" width="100%" border="0"
                    align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <!-- Email Content -->
                    <tr>
                        <td>
                            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                                style="max-width:670px; background:#fff; border-radius:3px;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);padding:2rem 40px;">
                                <!-- Logo -->
                                <tr>
                                    <td style="text-align:center;">
                                        <img src="{{ asset($logo->img_path) }}" alt="CME Standard Logo"
                                            style="max-width: 200px; margin-bottom: 20px;">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:20px;">&nbsp;</td>
                                </tr>
                                <!-- Title -->
                                <tr>
                                    <td style="padding:0 15px; text-align:center;">
                                        <h1
                                            style="color:#1e1e2d; font-weight:400; margin:0;font-size:32px;font-family:'Rubik',sans-serif; margin-bottom: 0.75rem;">
                                            CME Attendance Confirmation
                                        </h1>

                                        <span
                                            style="display:inline-block; vertical-align:middle; margin:10px 0 35px; border-bottom:1px solid #cecece; 
                                        width:100px;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:0 15px; text-align:left;">
                                        <p
                                            style="font-size:16px; color:#333; font-family:'Rubik',sans-serif; margin:0;">
                                            Dear {{ $training->endorser_name }},
                                        </p>

                                        <p
                                            style="font-size:16px; color:#333; font-family:'Rubik',sans-serif; margin:15px 0;">
                                            {{ $user->full_name }} has submitted a new training session on <a
                                                href="{{ env('APP_URL') }}" style="color:#D0962A;">our website,</a>.
                                            Below are the details of the training submission:
                                        </p>
                                    </td>
                                </tr>
                                <!-- Details Table -->
                                <tr>
                                    <td>
                                        <table class="responsive-table" cellpadding="0" cellspacing="0"
                                            style="width: 100%; border: 1px solid #ededed; border-collapse: collapse;">
                                            <thead>
                                                <tr>
                                                    <th
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; text-align:left;">
                                                        Field</th>
                                                    <th
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; text-align:left;">
                                                        Value</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; width: 50%; font-weight:500; color:rgba(0,0,0,.64);">
                                                        CME ID</td>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; width: 50%; font-weight:500; color:rgba(0,0,0,.64);">
                                                        {{ $training->custom_id }}</td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; width: 50%; font-weight:500; color:rgba(0,0,0,.64);">
                                                        Title</td>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; width: 50%; font-weight:500; color:rgba(0,0,0,.64);">
                                                        {{ $training->title }}</td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; width: 50%; font-weight:500; color:rgba(0,0,0,.64);">
                                                        Category</td>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; width: 50%; font-weight:500; color:rgba(0,0,0,.64);">
                                                        {{ $training->category->name ?? '' }}</td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; width: 50%; font-weight:500; color:rgba(0,0,0,.64);">
                                                        Provider / Accreditor</td>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; width: 50%; font-weight:500; color:rgba(0,0,0,.64);">
                                                        {{ $training->grand_provide }}</td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; width: 50%; font-weight:500; color:rgba(0,0,0,.64);">
                                                        Format</td>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; width: 50%; font-weight:500; color:rgba(0,0,0,.64);">
                                                        {{ $training->format }}</td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; width: 50%; font-weight:500; color:rgba(0,0,0,.64);">
                                                        Type</td>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; width: 50%; font-weight:500; color:rgba(0,0,0,.64);">
                                                        {{ $training->type }}</td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; width: 50%; font-weight:500; color:rgba(0,0,0,.64);">
                                                        Status</td>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; width: 50%; font-weight:500; color:rgba(0,0,0,.64);">
                                                        {{ $training->status }}</td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; width: 50%; font-weight:500; color:rgba(0,0,0,.64);">
                                                        Month/Year</td>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; width: 50%; font-weight:500; color:rgba(0,0,0,.64);">
                                                        {{ date('M d, Y', strtotime($training->date)) }} </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; width: 50%; font-weight:500; color:rgba(0,0,0,.64);">
                                                        Credit Hours</td>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; width: 50%; font-weight:500; color:rgba(0,0,0,.64);">
                                                        {{ $training->credit_hours }}</td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; width: 50%; font-weight:500; color:rgba(0,0,0,.64);">
                                                        Certificate</td>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; width: 50%; font-weight:500; color:rgba(0,0,0,.64);">
                                                        <a style="color:#D0962A;"
                                                            href="{{ asset($training->certificate) }}">View
                                                            Certificate</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <!-- Approval Button -->
                                <tr>
                                    <td style="padding: 20px 15px; text-align:center;">
                                        <a href="{{ route('change_training_status', ['id' => $training->id, 'status' => 'endorser_approved']) }}"
                                            style="display:inline-block; background-color:#D0962A; color:#ffffff; padding:10px 20px; text-decoration:none; font-family:'Rubik',sans-serif; font-size:16px; border-radius:5px;">
                                            CME Attendance Confirmation
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                <!-- Footer -->
                                <tr>
                                    <td style="padding:15px; text-align:center; font-size:14px; color:#a6a6a6;">
                                        <p style="margin:0;">&copy; {{ date('Y') }} {{ env('APP_NAME') }}. All
                                            rights reserved.</p>
                                        <p style="margin:0;"><a href="{{ env('APP_URL') }}"
                                                style="color:#D0962A;">Visit our website</a></p>
                                    </td>
                                </tr>
                                <!-- End of Footer -->
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
