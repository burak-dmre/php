<?php

class User {
    private $id;
    private $username;
    private $email;

    public function __construct($id, $username, $email) {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
    }

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getEmail() {
        return $this->email;
    }
}

class UserManager {
    private $db;

    public function __construct(DatabaseManager $db) {
        $this->db = $db;
    }

    public function getUserById($id) {
        $userData = $this->db->getUserDataById($id);
        return new User($userData['id'], $userData['username'], $userData['email']);
    }

    // Other user management methods can be added here, such as createUser, updateUser, etc.
}

class DatabaseManager {
    public function getUserDataById($id) {
        // Simulate fetching user data from the database
        // This method would typically interact with a real database
        $userData = array(
            'id' => $id,
            'username' => 'user_' . $id,
            'email' => 'user' . $id . '@example.com'
        );
        return $userData;
    }
}

// Usage example:
$db = new DatabaseManager();
$userManager = new UserManager($db);
$user = $userManager->getUserById(123);

echo "User ID: " . $user->getId() . "\n";
echo "Username: " . $user->getU
