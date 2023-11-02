<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ public_path().'/css/pdf/leave.css' }}">
    <style>
        h1 {
            text-align: center;
            font-size: 24pt;
            font-family: "Times New Roman";
        }

        div.fake-header {
            padding-top: 200px;
        }

        div.separator {
            padding-top: 70px;
        }

        div.mini-separator {
            padding-top: 40px;
        }

        .content {
            font-size: 20pt;
            font-family: "Times New Roman";
        }

        .indent {
            text-indent: 100px;
        }

        .left {
            float: left;
        }

        .right {
            float: right;
        }
    </style>
</head>

<body>
<div class="fake-header"></div>
<h1>Mr. Director,</h1>
<div class="separator"></div>
<p class="content indent">
    I, {{ $vacation->employee->first_name }} {{ $vacation->employee->last_name }}, employee in your company on the project
     {{ $vacation->employee->project->name }}, having the position of {{ $vacation->employee->salary->position }},
    please approve me taking the next off days -
    @if ($vacation->start_date != $vacation->end_date)
        period: {{ date('d.m.Y', strtotime($vacation->start_date)) }}
        - {{ date('d.m.Y', strtotime($vacation->end_date)) }}
    @else
        the day: {{ date('d.m.Y', strtotime($vacation->start_date)) }}
    @endif
</p>
<div class="mini-separator"></div>
<div class="left content">Thank you!</div>
<div class="right content">Signature</div>
</body>
</html>
