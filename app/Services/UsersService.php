<?php

namespace App\Services;

use App\Models\User;

/**
 * Class UsersService
 * Класс-сервис для работы с пользователями
 * @package App\Services
 */
class UsersService
{
    /**
     * @param $name
     * @param $email
     * @return User
     * @throws \Exception
     */
    public function findOrCreate(string $name, string $email) : User
    {
        if ($user = $this->findByEmail($email)) {
            return $user;
        }

        return $this->create([
            'name' => $name,
            'email' => $email
        ]);
    }

    /**
     * Создает нового пользователя
     * @param $data
     * @return User
     * @throws \Exception
     */
    public function create($data) : User
    {
        $this->validateBeforeCreate($data);

        return User::create($data);
    }

    public function findByEmail(string $email) : User
    {
        return User::where('email', $email)->first();
    }

    /**
     * Валидация перед вставкой в БД
     * @return bool
     * @throws \Exception
     */
    private function validateBeforeCreate($data)
    {
        if (false) {
            throw new \Exception('User data not valid');
        }

        return true;
    }
}
