<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Laravel post-it project

# This project is only for learning purposes
# Installation, Dependencies
The project uses Laravel, TailwindCss, AlpineJS
- PHP ^8.0.2
- Run > npm install to load dependencies
- Create database table name "post-it" with root user to implement migrations
- Run > php artisan migrate --seed to seed with dummy users and related dummy posts
- Run > php artisan serve to start local server : requires local server like apache/xampp
- Run > npm run dev to start vite server and build components continously
**
Basic Authentication provided by Laravel,  
User CRUD functionality,     
Post CRUD functionality,    
Friendship relations between users,    
**
# @TODO:
- Finish View components and view endpoints
- Create albums for images? Posts might be enough for now
- Create comments section under posts
- Reconfigure codes @ backend for simplicity and readability
- Create post likes structure
- Separate some backend structures:
    * Add Request validators
    * maybe reconfigure and reconsider routes
- Queries seems to be duplicated (idk how but will get back to it)
    * maybe cache them ?
- View renders slow/sometimes not work at first try(???)
- Update seeder, implement seeder, maybe some Rules
- Create admin panel (include package?)
- Implement live chat (livewire)
- Image upload preview (livewire)
- View is now desktop only, create mobile/tablet views
- Dark/light mode toggle

might try to replace frontend with VUE & tailwind || Livewire & tailwind
