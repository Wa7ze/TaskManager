<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Users</title>
    <style>
        body {
            background: #181818;
            color: #fff;
            margin: 0;
            min-height: 100vh;
            font-family: Arial, sans-serif;
        }
        .centered {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 60px;
        }
        h1 {
            margin-bottom: 30px;
        }
        .filters {
            display: flex;
            gap: 10px;
            margin-bottom: 30px;
        }
        .filters input, .filters select, .filters button {
            padding: 8px 12px;
            border-radius: 4px;
            border: none;
            font-size: 16px;
        }
        .filters input, .filters select {
            background: #222;
            color: #fff;
        }
        .filters button {
            background: #007bff;
            color: #fff;
            cursor: pointer;
        }
        .users-list {
            display: flex;
            flex-wrap: wrap;
            gap: 24px;
            justify-content: center;
        }
        .user-card {
            background: #222;
            border-radius: 12px;
            padding: 24px;
            min-width: 260px;
            max-width: 320px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
            margin-bottom: 16px;
        }
        .user-card h2 {
            margin: 0 0 10px 0;
            font-size: 22px;
        }
        .user-info {
            font-size: 16px;
            margin-bottom: 4px;
        }
        .btn-secondary {
            display: inline-block;
            padding: 10px 20px;
            background: #444;
            color: #fff;
            text-decoration: none;
            border-radius: 12px;
            transition: 0.3s ease;
        }
        .btn-secondary:hover {
            background: #666;
        }
    </style>
    <script>
        // Simple JS filtering for demonstration
        document.addEventListener('DOMContentLoaded', function() {
            const users = [
                {name: 'alex99', age: 24, gender: 'M', email: 'alex99@email.com'},
                {name: 'sarah_j', age: 28, gender: 'F', email: 'sarahj@email.com'},
                {name: 'mike_theman', age: 31, gender: 'M', email: 'mike@email.com'},
                {name: 'linda_star', age: 22, gender: 'F', email: 'linda@email.com'},
                {name: 'johnnyB', age: 27, gender: 'M', email: 'johnnyb@email.com'},
                {name: 'emma_w', age: 25, gender: 'F', email: 'emma@email.com'},
                {name: 'david_lee', age: 29, gender: 'M', email: 'david@email.com'},
                {name: 'nina_p', age: 23, gender: 'F', email: 'nina@email.com'},
                {name: 'tommygun', age: 26, gender: 'M', email: 'tommy@email.com'},
                {name: 'olivia_c', age: 30, gender: 'F', email: 'olivia@email.com'}
            ];

            function renderUsers(list) {
                const container = document.getElementById('users-list');
                container.innerHTML = '';
                list.forEach(user => {
                    const card = document.createElement('div');
                    card.className = 'user-card';
                    card.innerHTML = `
                        <h2>${user.name}</h2>
                        <div class="user-info"><strong>Age:</strong> ${user.age}</div>
                        <div class="user-info"><strong>Gender:</strong> ${user.gender}</div>
                        <div class="user-info"><strong>Email:</strong> ${user.email}</div>
                    `;
                    container.appendChild(card);
                });
            }

            function applyFilters() {
                const search = document.getElementById('search').value.toLowerCase();
                const gender = document.getElementById('gender').value;
                let filtered = users.filter(user => 
                    (user.name.toLowerCase().includes(search) || user.email.toLowerCase().includes(search))
                    && (gender === '' || user.gender === gender)
                );
                renderUsers(filtered);
            }

            document.getElementById('applyBtn').addEventListener('click', applyFilters);

            renderUsers(users);
        });
    </script>
</head>
<body>
    <a href="{{ route('home') }}" class="btn btn-secondary mb-3" style="position:fixed;top:24px;left:24px;z-index:10;">← Back to Home</a>
    <div class="centered">
        <h1>Users</h1>
        <div class="filters">
            <input type="text" id="search" placeholder="Search users...">
            <select id="gender">
                <option value="">All</option>
                <option value="M">M</option>
                <option value="F">F</option>
            </select>
            <button id="applyBtn">Apply</button>
        </div>
        <div class="users-list" id="users-list"></div>
    </div>
</body>
</html>