<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create users
        $users = [
            [
                'username' => 'user1',
                'email' => 'user1@example.com',
                'password' => Hash::make('password'),
                'age' => 25,
                'address' => 'Address 1',
                'work' => 'Work 1',
                'study' => 'Study 1',
                'status' => 'active',
            ],
            [
                'username' => 'user2',
                'email' => 'user2@example.com',
                'password' => Hash::make('password'),
                'age' => 28,
                'address' => 'Address 2',
                'work' => 'Work 2',
                'study' => 'Study 2',
                'status' => 'active',
            ],
            [
                'username' => 'user3',
                'email' => 'user3@example.com',
                'password' => Hash::make('password'),
                'age' => 30,
                'address' => 'Address 3',
                'work' => 'Work 3',
                'study' => 'Study 3',
                'status' => 'active',
            ],
            [
                'username' => 'user4',
                'email' => 'user4@example.com',
                'password' => Hash::make('password'),
                'age' => 22,
                'address' => 'Address 4',
                'work' => 'Work 4',
                'study' => 'Study 4',
                'status' => 'active',
            ],
            [
                'username' => 'user5',
                'email' => 'user5@example.com',
                'password' => Hash::make('password'),
                'age' => 27,
                'address' => 'Address 5',
                'work' => 'Work 5',
                'study' => 'Study 5',
                'status' => 'active',
            ],
            [
                'username' => 'user6',
                'email' => 'user6@example.com',
                'password' => Hash::make('password'),
                'age' => 35,
                'address' => 'Address 6',
                'work' => 'Work 6',
                'study' => 'Study 6',
                'status' => 'active',
            ],
            [
                'username' => 'user7',
                'email' => 'user7@example.com',
                'password' => Hash::make('password'),
                'age' => 26,
                'address' => 'Address 7',
                'work' => 'Work 7',
                'study' => 'Study 7',
                'status' => 'active',
            ],
            [
                'username' => 'user8',
                'email' => 'user8@example.com',
                'password' => Hash::make('password'),
                'age' => 29,
                'address' => 'Address 8',
                'work' => 'Work 8',
                'study' => 'Study 8',
                'status' => 'active',
            ],
            [
                'username' => 'user9',
                'email' => 'user9@example.com',
                'password' => Hash::make('password'),
                'age' => 32,
                'address' => 'Address 9',
                'work' => 'Work 9',
                'study' => 'Study 9',
                'status' => 'active',
            ],
            [
                'username' => 'user10',
                'email' => 'user10@example.com',
                'password' => Hash::make('password'),
                'age' => 31,
                'address' => 'Address 10',
                'work' => 'Work 10',
                'study' => 'Study 10',
                'status' => 'active',
            ],
        ];

        foreach ($users as $user) {
            $userId = DB::table('users')->insertGetId($user);

            // Create profile for each user
            DB::table('profiles')->insert([
                'user_id' => $userId,
                'path' => 'public/profiles/' . $userId . '.jpeg',
            ]);

            // Create posts for some users
            if ($userId % 2 == 0) {
                $postId = DB::table('posts')->insertGetId([
                    'content' => 'Post by ' . $user['username'],
                    'user_id' => $userId,
                ]);

                // Create images for the posts
                DB::table('images')->insert([
                    'path' => 'public/images/image-' . $userId . '.jpg',
                    'post_id' => $postId,
                ]);
            }
        }

        // Create some follows
        $follows = [
            [
                'user_id' => 1,
                'following_id' => 2,
            ],
            [
                'user_id' => 2,
                'following_id' => 3,
            ],
            [
                'user_id' => 3,
                'following_id' => 4,
            ],
            [
                'user_id' => 4,
                'following_id' => 5,
            ],
            [
                'user_id' => 5,
                'following_id' => 6,
            ],
            [
                'user_id' => 6,
                'following_id' => 7,
            ],
            [
                'user_id' => 7,
                'following_id' => 8,
            ],
            [
                'user_id' => 8,
                'following_id' => 9,
            ],
            [
                'user_id' => 9,
                'following_id' => 10,
            ],
            [
                'user_id' => 10,
                'following_id' => 1,
            ],
        ];
        DB::table('follows')->insert($follows);

        // Create some likes
        $likes = [
            [
                'user_id' => 1,
                'post_id' => 2,
            ],
            [
                'user_id' => 2,
                'post_id' => 3,
            ],
            [
                'user_id' => 3,
                'post_id' => 4,
            ],
        ];
        DB::table('likes')->insert($likes);

        // Create some comments
        $comments = [
            [
                'content' => 'Comment 1 for Post 2 by User 1',
                'user_id' => 1,
                'post_id' => 2,
            ],
            [
                'content' => 'Comment 2 for Post 3 by User 2',
                'user_id' => 2,
                'post_id' => 3,
            ],
            [
                'content' => 'Comment 3 for Post 4 by User 3',
                'user_id' => 3,
                'post_id' => 4,
            ],
        ];
        DB::table('comments')->insert($comments);
    }
}
