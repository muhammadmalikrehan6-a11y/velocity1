<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoBook | Bookings Manager</title>
    <style>
        /* GLOBAL RESET & CAR BACKGROUND */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            min-height: 100vh;
            padding: 2rem 1.5rem;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #0a1219; /* fallback */
        }

        /* PREMIUM CAR BACKGROUND IMAGE (dynamic, automotive atmosphere) */
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://images.pexels.com/photos/170811/pexels-photo-170811.jpeg?auto=compress&cs=tinysrgb&w=1920&q=80');
            background-size: cover;
            background-position: center 30%;
            background-repeat: no-repeat;
            filter: brightness(0.65) contrast(1.05);
            z-index: -2;
        }

        /* soft dark overlay to keep text readable, yet transparent feel */
        body::after {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.45);
            z-index: -1;
        }

        /* MAIN CONTAINER – TRANSPARENT CARD (car picture visible behind) */
        .container {
            width: 92%;
            max-width: 1400px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(3px);
            border-radius: 32px;
            box-shadow: 0 20px 40px -12px rgba(0, 0, 0, 0.35);
            padding: 1.8rem 2rem 2rem 2rem;
            transition: all 0.2s ease;
        }

        /* HEADER SECTION with back button and title */
        .header-flex {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.8rem;
            gap: 1rem;
            border-bottom: 2px solid rgba(0, 110, 200, 0.2);
            padding-bottom: 0.9rem;
        }

        h2 {
            font-size: 1.9rem;
            font-weight: 700;
            letter-spacing: -0.3px;
            background: linear-gradient(135deg, #1f3e48, #0e5e7e);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            margin: 0;
        }

        /* BACK BUTTON – simple, route‑aware, no icons */
        .back-btn {
            background: #eef2f7;
            border: 1px solid #cbdbe0;
            padding: 8px 24px;
            border-radius: 60px;
            font-size: 0.85rem;
            font-weight: 600;
            color: #1f3a4b;
            text-decoration: none;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-family: inherit;
            cursor: pointer;
        }

        .back-btn:hover {
            background: #e2e8f0;
            border-color: #9fb7cf;
            transform: translateY(-1px);
            box-shadow: 0 3px 8px rgba(0,0,0,0.05);
        }

        /* ALERT SUCCESS – subtle and clean */
        .alert-success {
            background: #e0f2e9;
            border-left: 5px solid #2c7a4a;
            color: #1a5336;
            padding: 12px 20px;
            border-radius: 20px;
            margin-bottom: 24px;
            font-weight: 500;
            font-size: 0.85rem;
            backdrop-filter: blur(2px);
        }

        /* TABLE WRAPPER – responsive */
        .table-wrapper {
            overflow-x: auto;
            margin-top: 0.5rem;
        }

        /* SIMPLE MODERN TABLE – transparent background to match container */
        table {
            width: 100%;
            border-collapse: collapse;
            background: rgba(255, 255, 255, 0.7);
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.05);
        }

        thead {
            background: #1f2f3c;
            color: white;
        }

        th {
            padding: 14px 12px;
            text-align: center;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            font-weight: 600;
        }

        td {
            padding: 14px 12px;
            text-align: center;
            font-size: 0.85rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.08);
            color: #1e2f3c;
            font-weight: 500;
            background-color: rgba(255, 255, 255, 0.6);
        }

        tr:hover td {
            background-color: rgba(240, 248, 255, 0.9);
        }

        /* ACTION BUTTONS – keep original classes but restyled minimally */
        .btn {
            padding: 6px 14px;
            border-radius: 40px;
            text-decoration: none;
            margin: 0 3px;
            font-size: 0.7rem;
            font-weight: 600;
            display: inline-block;
            transition: 0.2s;
            border: none;
            cursor: pointer;
            font-family: inherit;
        }

        .btn-edit {
            background: #fff0da;
            color: #b95f00;
            border: 1px solid #ffd8a5;
        }

        .btn-edit:hover {
            background: #ffe3c0;
            transform: translateY(-1px);
        }

        .btn-delete {
            background: #ffe9ea;
            color: #bc2f3e;
            border: 1px solid #ffc9cc;
        }

        .btn-delete:hover {
            background: #ffdbdd;
            transform: translateY(-1px);
        }

        /* inline form inside table */
        form {
            display: inline;
        }

        /* message column wrap */
        td:nth-child(7) {
            max-width: 220px;
            white-space: normal;
            word-break: break-word;
        }

        /* responsive: small screens */
        @media (max-width: 780px) {
            .container {
                padding: 1.2rem;
                width: 98%;
            }
            th, td {
                padding: 10px 6px;
            }
            .btn {
                padding: 4px 10px;
                font-size: 0.65rem;
            }
            h2 {
                font-size: 1.5rem;
            }
        }

        /* extra mobile friendly: transform table to block */
        @media (max-width: 650px) {
            thead {
                display: none;
            }
            table, tbody, tr, td {
                display: block;
                width: 100%;
            }
            tr {
                margin-bottom: 18px;
                background: rgba(255, 255, 255, 0.85);
                border-radius: 20px;
                border: 1px solid #eef2f8;
                overflow: hidden;
            }
            td {
                display: flex;
                justify-content: space-between;
                align-items: center;
                text-align: right;
                padding: 12px 16px;
                border-bottom: 1px solid #e9edf2;
                background: rgba(255, 255, 255, 0.85);
            }
            td::before {
                content: attr(data-label);
                font-weight: 700;
                text-align: left;
                flex: 1;
                font-size: 0.7rem;
                color: #1c5a78;
                text-transform: uppercase;
                letter-spacing: 0.3px;
            }
            td:last-child {
                border-bottom: none;
            }
            .action-group {
                justify-content: flex-end;
            }
        }

        /* small footer (optional) */
        .footer-note {
            margin-top: 24px;
            text-align: center;
            font-size: 0.7rem;
            color: #4a6a82;
            border-top: 1px solid rgba(0,0,0,0.05);
            padding-top: 16px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header-flex">
        <h2>📋 Bookings List</h2>
        <!-- BACK BUTTON: uses Laravel route helper to go back (previous URL) -->
        <a href="{{ route('td') }}" class="back-btn">← Back</a>
    </div>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Model</th>
                    <th>Preferred Date</th>
                    <th>Message</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $item)
                <tr>
                    <td data-label="ID">{{ $item->id }}</td>
                    <td data-label="Name">{{ $item->name }}</td>
                    <td data-label="Email">{{ $item->email }}</td>
                    <td data-label="Phone">{{ $item->phone }}</td>
                    <td data-label="Model">{{ $item->model }}</td>
                    <td data-label="Preferred Date">{{ $item->preferred_date }}</td>
                    <td data-label="Message">{{ $item->message }}</td>
                    <td data-label="Action">
                       
                    <form action="{{ route('t.destroy', $item->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-delete" onclick="return confirm('Delete?')">Delete</button>
</form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="footer-note">
        DriveNexus · premium booking overview
    </div>
</div>
</body>
</html>