
### **Step 1: Install Laravel and Breeze with tailwindcss Dependencies**

```bash

cd my-laravel-project

composer update

npm install 

```

---

### **Step 2: Configure Environment**

Copy the `.env.example` file to `.env`:

```bash

cp .env.example .env

php artisan key:generate

php artisan migrate --seed

```

---

### **Step 3: Run Laravel Server and Breeze**

Now, start your application:

```bash 
php artisan serve
```

```bash 
npm run dev
```

Open **`http://127.0.0.1:8000`** in your browser.

---

### **Step 7: Login To Dashboard**

```bash
 Email : test@example.com
 password : password123
```
