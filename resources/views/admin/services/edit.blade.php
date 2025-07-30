<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Service</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
        }

        .rounded-nav {
            border-bottom-left-radius: 30px;
            border-bottom-right-radius: 30px;
        }

        .logo {
            width: 50px;
        }

        .btn-back {
            background-color: transparent;
            border: none;
            color: #6c757d;
            padding: 6px 16px;
            font-weight: 500;
        }

        .btn-back:hover {
            color: #3461FF;
            background-color: transparent;
        }

        .btn-logout {
            border-color: #3461FF;
            border-radius: 10px;
            padding: 6px 20px;
            color: #6c757d;
        }

        .btn-logout:hover {
            background-color: #3461FF;
            color: #ffffff;
        }

        .form-container {
            max-width: 800px;
            margin: 60px auto;
            background: #ffffff;
            padding: 36px;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 8px;
            color: #6c757d;
        }

        .btn-update {
            background: linear-gradient(to right, #3461FF, #1837A0);
            border: none;
            border-radius: 12px;
            font-weight: 600;
            width: 100%;
            padding: 12px;
            margin-top: 20px;
        }

        .btn-update:hover {
            background: linear-gradient(to right, #0032e8, #0f266e);
        }

        .title {
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
            text-decoration: underline;
            color: #0a2c6b;
        }

        .top-right-buttons {
            display: flex;
            gap: 10px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-light bg-white shadow-sm rounded-nav">
        <div class="container d-flex justify-content-between align-items-center py-2">
            <a href="{{ route('home.jpa') }}" class="d-flex align-items-center">
                <img src="{{ asset('assets/images/logo/jpa.png') }}" alt="Logo" class="logo me-2">
            </a>
            <div class="d-flex gap-2">
                <a href="{{ route('service.read', $service->id) }}" class="btn btn-back">Back</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-logout">Logout</button>
                </form>
            </div>
        </div>
    </nav>


    <div class="form-container">
        <h3 class="title">Edit Service</h3>
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif


        <form action="{{ route('service.update', $service->id) }}" method="POST" id="editForm">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" id="title" name="title" class="form-control"
                    value="{{ old('title', $service->title) }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea id="description" name="description">{{ old('description', $service->description) }}</textarea>
            </div>

            <button id="saveButton" type="submit" class="btn btn-update text-white">Update</button>
        </form>
    </div>

    <script>
        const form = document.getElementById('editForm');
        const saveButton = document.getElementById('saveButton');

        const fields = Array.from(form.querySelectorAll('input:not([type="file"]), textarea'));
        const fileInputs = Array.from(form.querySelectorAll('input[type="file"]'));

        const initialValues = {};
        fields.forEach(field => {
            initialValues[field.name] = field.value;
        });

        saveButton.disabled = true;

        let editorInstance;

        function checkChanges() {
            let changed = false;

            fields.forEach(field => {
                if (field.name !== 'description') {
                    if (field.value !== initialValues[field.name]) {
                        changed = true;
                    }
                }
            });

            if (editorInstance) {
                const currentDesc = editorInstance.getData();
                const originalDesc = initialValues['description'];
                if (currentDesc !== originalDesc) {
                    changed = true;
                }
            }

            fileInputs.forEach(fileInput => {
                if (fileInput.files.length > 0) {
                    changed = true;
                }
            });

            saveButton.disabled = !changed;
        }

        fields.forEach(field => {
            if (field.name !== 'description') {
                field.addEventListener('input', checkChanges);
            }
        });

        fileInputs.forEach(fileInput => {
            fileInput.addEventListener('change', checkChanges);
        });

        ClassicEditor
            .create(document.querySelector('#description'), {
                toolbar: [
                    'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|',
                    'blockQuote', 'insertTable', 'undo', 'redo'
                ]
            })
            .then(editor => {
                editorInstance = editor;

                initialValues['description'] = editor.getData();

                editor.model.document.on('change:data', checkChanges);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
</body>

</html>
