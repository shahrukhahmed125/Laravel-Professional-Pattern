

# 🏗️ Laravel Clean Architecture — Service & Repository Pattern

This project follows a **clean, scalable architecture** used in professional Laravel applications such as CRMs, SaaS products, and enterprise systems.

The goal is to keep:

* ✅ Controllers clean
* ✅ Business logic inside **Services**
* ✅ Database queries inside **Repositories**
* ✅ Data validation inside **Form Requests**
* ✅ Code easy to test & maintain

---

## 📂 Folder Structure

```
app/
 ├─ Http/
 │   ├─ Controllers/
 │   └─ Requests/
 ├─ Models/
 ├─ Services/
 ├─ Repositories/
 │   ├─ Interfaces/
 │   └─ Eloquent/
 └─ Providers/
```

---

## 🔄 Request Flow

```
Route → Controller → Service → Repository → Model → Database
```

### 🧩 Responsibility Breakdown

| Layer      | Responsibility                       |
| ---------- | ------------------------------------ |
| Controller | Handles HTTP request & response only |
| Service    | Business logic / Use case            |
| Repository | Data access layer (queries)          |
| Model      | Eloquent ORM                         |
| Request    | Validates input                      |

---

## 📦 Why This Pattern?

| Benefit                   | Explanation                                    |
| ------------------------- | ---------------------------------------------- |
| 🧼 Clean Code             | No business logic inside controllers           |
| 🔁 Reusable Logic         | Services and repositories are reusable         |
| 🛠️ Testable              | Easy to unit test each layer                   |
| ⚙️ Scalable               | Structure supports big real-world applications |
| 🎯 Separation of Concerns | Each layer has one clear responsibility        |

---

## 🧠 Example Workflow

User submits form → Controller calls Service → Service calls Repository → Repository interacts with Model → Model accesses DB → Response returns to user.

---

## ✅ Example Folder Code (Short Overview)

**Controller**

```php
public function store(ProjectRequest $request)
{
    $this->service->createProject($request->validated());
    return back()->with('success','Project created!');
}
```

**Service**

```php
public function createProject(array $data)
{
    return $this->repo->store($data);
}
```

**Repository**

```php
public function store(array $data)
{
    return Project::create($data);
}
```

---

## 🔐 Binding Repository to Interface

```php
$this->app->bind(
    ProjectRepositoryInterface::class,
    ProjectRepository::class
);
```

This allows us to swap database logic later (MongoDB, API, SQL) **without changing the service layer**.

---

## 🏁 Conclusion

This pattern brings **scalability, maintainability, and testability** to Laravel applications.

It is ideal for:

* ✔️ Enterprise apps
* ✔️ Multi-module admin panels
* ✔️ CRM / ERP systems
* ✔️ Long-term projects

> Not required for simple CRUD websites — but essential when you're building real systems.

---

## ⭐ Want to use this structure?

Clone the repo, explore the folder layout, and extend it with:

* DTOs (Data Transfer Objects)
* Action Classes
* Domain-Based Foldering
* Repository + Service per module

