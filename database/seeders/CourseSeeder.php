<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::create([
            'name' => 'PHP Backend',
            'course_info' => "PHP kursi — bu veb-rivojlantirishda ishlatiladigan eng mashhur tillardan biri. Bu kurs orqali siz PHP tilini o’rganib, saytlarni va veb-dasturlarni yaratishda keng imkoniyatlardan foydalana olasiz. Sizga veb-saytlarni amalga oshirish, interaktiv veb-dasturlarni yaratish, ma’lumotlarni qabul qilish va qaytarish, tarmoq orqali boshqa xizmatlarga murojaat qilish va ko’p qo’l ma’lumotlarni saqlash bo’yicha tajriba beriladi. Ushbu kurs o’z ichiga PHPning ilmiy aspektlarini, dasturlashda eng yaxshi praktikalarini va amaliyotda tajribani o’z ichiga olgan.",
            'teacher_id' => rand(1, 3),
            'photo_id' => '3',
            'start_course' => '2024-10-01',
            'course_duration' => '6 oy'
        ]);

        Course::create([
            'name' => 'Web Development',
            'course_info' => "Web Development — bu veb-rivojlantirishda ishlatiladigan eng mashhur tillardan biri. Bu kurs orqali siz PHP tilini o’rganib, saytlarni va veb-dasturlarni yaratishda keng imkoniyatlardan foydalana olasiz. Sizga veb-saytlarni amalga oshirish, interaktiv veb-dasturlarni yaratish, ma’lumotlarni qabul qilish va qaytarish, tarmoq orqali boshqa xizmatlarga murojaat qilish va ko’p qo’l ma’lumotlarni saqlash bo’yicha tajriba beriladi. Ushbu kurs o’z ichiga PHPning ilmiy aspektlarini, dasturlashda eng yaxshi praktikalarini va amaliyotda tajribani o’z ichiga olgan.",
            'teacher_id' => rand(1, 3),
            'photo_id' => '3',
            'start_course' => '2024-10-01',
            'course_duration' => '8 oy'
        ]);

        Course::create([
            'name' => 'FullStack',
            'course_info' => "FullStack kursi — bu veb-rivojlantirishda ishlatiladigan eng mashhur tillardan biri. Bu kurs orqali siz PHP tilini o’rganib, saytlarni va veb-dasturlarni yaratishda keng imkoniyatlardan foydalana olasiz. Sizga veb-saytlarni amalga oshirish, interaktiv veb-dasturlarni yaratish, ma’lumotlarni qabul qilish va qaytarish, tarmoq orqali boshqa xizmatlarga murojaat qilish va ko’p qo’l ma’lumotlarni saqlash bo’yicha tajriba beriladi. Ushbu kurs o’z ichiga PHPning ilmiy aspektlarini, dasturlashda eng yaxshi praktikalarini va amaliyotda tajribani o’z ichiga olgan.",
            'teacher_id' => rand(1, 3),
            'photo_id' => '3',
            'start_course' => '2024-10-01',
            'course_duration' => '9 oy'
        ]);

        Course::create([
            'name' => 'Java backend',
            'course_info' => "Java kursi — bu veb-rivojlantirishda ishlatiladigan eng mashhur tillardan biri. Bu kurs orqali siz PHP tilini o’rganib, saytlarni va veb-dasturlarni yaratishda keng imkoniyatlardan foydalana olasiz. Sizga veb-saytlarni amalga oshirish, interaktiv veb-dasturlarni yaratish, ma’lumotlarni qabul qilish va qaytarish, tarmoq orqali boshqa xizmatlarga murojaat qilish va ko’p qo’l ma’lumotlarni saqlash bo’yicha tajriba beriladi. Ushbu kurs o’z ichiga PHPning ilmiy aspektlarini, dasturlashda eng yaxshi praktikalarini va amaliyotda tajribani o’z ichiga olgan.",
            'teacher_id' => rand(1, 3),
            'photo_id' => '3',
            'start_course' => '2024-10-01',
            'course_duration' => '7 oy'
        ]);

        Course::create([
            'name' => 'Android',
            'course_info' => "Android kursi — bu veb-rivojlantirishda ishlatiladigan eng mashhur tillardan biri. Bu kurs orqali siz PHP tilini o’rganib, saytlarni va veb-dasturlarni yaratishda keng imkoniyatlardan foydalana olasiz. Sizga veb-saytlarni amalga oshirish, interaktiv veb-dasturlarni yaratish, ma’lumotlarni qabul qilish va qaytarish, tarmoq orqali boshqa xizmatlarga murojaat qilish va ko’p qo’l ma’lumotlarni saqlash bo’yicha tajriba beriladi. Ushbu kurs o’z ichiga PHPning ilmiy aspektlarini, dasturlashda eng yaxshi praktikalarini va amaliyotda tajribani o’z ichiga olgan.",
            'teacher_id' => rand(1, 3),
            'photo_id' => '3',
            'start_course' => '2024-10-01',
            'course_duration' => '5 oy'
        ]);

        Course::create([
            'name' => 'JavaScript Frontend',
            'course_info' => "JavaScript Frontend kursi — bu veb-rivojlantirishda ishlatiladigan eng mashhur tillardan biri. Bu kurs orqali siz PHP tilini o’rganib, saytlarni va veb-dasturlarni yaratishda keng imkoniyatlardan foydalana olasiz. Sizga veb-saytlarni amalga oshirish, interaktiv veb-dasturlarni yaratish, ma’lumotlarni qabul qilish va qaytarish, tarmoq orqali boshqa xizmatlarga murojaat qilish va ko’p qo’l ma’lumotlarni saqlash bo’yicha tajriba beriladi. Ushbu kurs o’z ichiga PHPning ilmiy aspektlarini, dasturlashda eng yaxshi praktikalarini va amaliyotda tajribani o’z ichiga olgan.",
            'teacher_id' => rand(1, 3),
            'photo_id' => '3',
            'start_course' => '2024-10-01',
            'course_duration' => '6 oy'
        ]);

        Course::create([
            'name' => 'IOS Development',
            'course_info' => "IOS Development kursi — bu veb-rivojlantirishda ishlatiladigan eng mashhur tillardan biri. Bu kurs orqali siz PHP tilini o’rganib, saytlarni va veb-dasturlarni yaratishda keng imkoniyatlardan foydalana olasiz. Sizga veb-saytlarni amalga oshirish, interaktiv veb-dasturlarni yaratish, ma’lumotlarni qabul qilish va qaytarish, tarmoq orqali boshqa xizmatlarga murojaat qilish va ko’p qo’l ma’lumotlarni saqlash bo’yicha tajriba beriladi. Ushbu kurs o’z ichiga PHPning ilmiy aspektlarini, dasturlashda eng yaxshi praktikalarini va amaliyotda tajribani o’z ichiga olgan.",
            'teacher_id' => rand(1, 3),
            'photo_id' => '3',
            'start_course' => '2024-10-01',
            'course_duration' => '7 oy'
        ]);

        Course::create([
            'name' => 'Web Design',
            'course_info' => "Web Design kursi — bu veb-rivojlantirishda ishlatiladigan eng mashhur tillardan biri. Bu kurs orqali siz PHP tilini o’rganib, saytlarni va veb-dasturlarni yaratishda keng imkoniyatlardan foydalana olasiz. Sizga veb-saytlarni amalga oshirish, interaktiv veb-dasturlarni yaratish, ma’lumotlarni qabul qilish va qaytarish, tarmoq orqali boshqa xizmatlarga murojaat qilish va ko’p qo’l ma’lumotlarni saqlash bo’yicha tajriba beriladi. Ushbu kurs o’z ichiga PHPning ilmiy aspektlarini, dasturlashda eng yaxshi praktikalarini va amaliyotda tajribani o’z ichiga olgan.",
            'teacher_id' => rand(1, 3),
            'photo_id' => '3',
            'start_course' => '2024-10-01',
            'course_duration' => '9 oy'
        ]);

        Course::create([
            'name' => 'C, C++ Development',
            'course_info' => "Web Design kursi — bu veb-rivojlantirishda ishlatiladigan eng mashhur tillardan biri. Bu kurs orqali siz PHP tilini o’rganib, saytlarni va veb-dasturlarni yaratishda keng imkoniyatlardan foydalana olasiz. Sizga veb-saytlarni amalga oshirish, interaktiv veb-dasturlarni yaratish, ma’lumotlarni qabul qilish va qaytarish, tarmoq orqali boshqa xizmatlarga murojaat qilish va ko’p qo’l ma’lumotlarni saqlash bo’yicha tajriba beriladi. Ushbu kurs o’z ichiga PHPning ilmiy aspektlarini, dasturlashda eng yaxshi praktikalarini va amaliyotda tajribani o’z ichiga olgan.",
            'teacher_id' => rand(1, 3),
            'photo_id' => '3',
            'start_course' => '2024-10-01',
            'course_duration' => '11 oy'
        ]);

        Course::create([
            'name' => 'C#, .NET Development',
            'course_info' => "Web Design kursi — bu veb-rivojlantirishda ishlatiladigan eng mashhur tillardan biri. Bu kurs orqali siz PHP tilini o’rganib, saytlarni va veb-dasturlarni yaratishda keng imkoniyatlardan foydalana olasiz. Sizga veb-saytlarni amalga oshirish, interaktiv veb-dasturlarni yaratish, ma’lumotlarni qabul qilish va qaytarish, tarmoq orqali boshqa xizmatlarga murojaat qilish va ko’p qo’l ma’lumotlarni saqlash bo’yicha tajriba beriladi. Ushbu kurs o’z ichiga PHPning ilmiy aspektlarini, dasturlashda eng yaxshi praktikalarini va amaliyotda tajribani o’z ichiga olgan.",
            'teacher_id' => rand(1, 3),
            'photo_id' => '3',
            'start_course' => '2024-10-01',
            'course_duration' => '10 oy'
        ]);

        Course::create([
            'name' => 'Foundation',
            'course_info' => "Web Design kursi — bu veb-rivojlantirishda ishlatiladigan eng mashhur tillardan biri. Bu kurs orqali siz PHP tilini o’rganib, saytlarni va veb-dasturlarni yaratishda keng imkoniyatlardan foydalana olasiz. Sizga veb-saytlarni amalga oshirish, interaktiv veb-dasturlarni yaratish, ma’lumotlarni qabul qilish va qaytarish, tarmoq orqali boshqa xizmatlarga murojaat qilish va ko’p qo’l ma’lumotlarni saqlash bo’yicha tajriba beriladi. Ushbu kurs o’z ichiga PHPning ilmiy aspektlarini, dasturlashda eng yaxshi praktikalarini va amaliyotda tajribani o’z ichiga olgan.",
            'teacher_id' => rand(1, 3),
            'photo_id' => '3',
            'start_course' => '2024-10-01',
            'course_duration' => '2 oy'
        ]);
    }
}
