CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    number VARCHAR(50),
    design VARCHAR(100)
);

INSERT INTO orders (name, number, design) VALUES
('John Doe', '123', 'Cricket Jersey Design'),
('Jane Doe', '456', 'New Jersey Design');
