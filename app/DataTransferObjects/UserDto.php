<?php

namespace App\DataTransferObjects;

use App\Models\User;
use Crypt;
use Spatie\LaravelData\Data;

class UserDto extends Data
{
    public function __construct(
        public int $id,
        public string $uuid,
        public string $email,
        public string $uuid_encrypted
    ) {

    }

    public static function fromModel(User $user): self
    {
        return new self(
            $user->id,
            $user->uuid,
            $user->email,
            self::uuidEncrypted($user)
        );
    }

    public static function uuidEncrypted($user)
    {
        return Crypt::encryptString($user->uuid);
    }
}
