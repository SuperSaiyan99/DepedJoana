<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Initial Evaluation Result (IER)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-size: 12px;
            margin: 20px;
        }
        .a4-landscape {
            width: 100%;
            height: auto;
            page-break-after: always;
        }
        table {
            width: 100%;
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
        }
        th {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
<div class="container a4-landscape">
    <h5 class="text-center">INITIAL EVALUATION RESULT (IER)</h5>
    <p><strong>Position:</strong> _________________________</p>
    <p><strong>Salary Grade and Monthly Salary:</strong> _________________________</p>
    <p><strong>Qualification Standards:</strong></p>
    <ul>
        <li><strong>Education:</strong> {{ ucwords($vacancyInfo['education']) }}</li>
        <li><strong>Training:</strong> {{ ucwords($vacancyInfo['training']) }}</li>
        <li><strong>Experience:</strong> <td>{{ ucwords($vacancyInfo['experience']) }}</li>
        <li><strong>Eligibility:</strong> <td>{{ ucwords($vacancyInfo['eligibility']) }}</li>
    </ul>

    <table>
        <thead>
        <tr>
            <th rowspan="2">No.</th>
            <th rowspan="2">Application Code</th>
            <th rowspan="2">Education</th>
            <th colspan="2">Training</th>
            <th colspan="2">Experience</th>
            <th rowspan="2">Eligibility</th>
            <th rowspan="2">Remarks (Qualified or Disqualified)</th>
        </tr>
        <tr>
            <th>Title</th>
            <th>Hours</th>
            <th>Details</th>
            <th>Years</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $index => $info)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td>{{ $info->applicant_code }}</td>
                <td>{{ $info->first_name . ' ' .   $info->middle_name[0] . ' ' . $info->surname . ' ' . $info->name_extension}}</td>
                <td>NC III Bookkeeping</td>
                <td class="text-center">292</td>
                <td>Bookkeeper - Unosphere Laboratory Specialists, Inc. (Apr 1, 2012 to Aug 4, 2023)<br>
                    Accounting Assistant - Alcon Industries, Inc. (Feb 23, 2011 to Mar 20, 2012)
                </td>
                <td class="text-center">11.40</td>
                <td class="text-center">Career Service Professional</td>
                <td class="text-center">{{ $info->overall_remarks_status }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        <p><strong>Prepared and certified correct by:</strong></p>
        <div class="row">
            <div class="col-6">
                <p>__________________________</p>
                <p>(Name and signature)</p>
                <p>Human Resource Management Officer</p>
            </div>
            <div class="col-6 text-end">
                <p>Date: ____________________</p>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
