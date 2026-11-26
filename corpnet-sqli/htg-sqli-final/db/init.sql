CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(100) NOT NULL,
    department VARCHAR(50) NOT NULL,
    role VARCHAR(50) NOT NULL,
    access_code VARCHAR(50) NOT NULL
);
INSERT INTO users (username, password, department, role, access_code) VALUES
('admin',  'Tr0ub4dor&3_x9mK!', 'IT Security',     'System Administrator', 'CORP-ADM-2024-xK9m'),
('jdoe',   'Summer2024!',        'Marketing',        'Marketing Analyst',    'CORP-MKT-2024-jD3x'),
('msmith', 'Finance#99',         'Finance',          'Senior Accountant',    'CORP-FIN-2024-mS7k'),
('rjones', 'Hr@Pass123',         'Human Resources',  'HR Manager',           'CORP-HR-2024-rJ2p');
