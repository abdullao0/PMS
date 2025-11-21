@extends('templates.base')

@section('title', 'Shop Settings - PMS')

@section('content')
<style>
    .settings-container {
        max-width: 900px;
        margin: 2rem auto;
        padding: 0 2rem;
    }

    .settings-section {
        background: #ffffff;
        border-radius: 15px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        padding: 2rem;
        margin-bottom: 2rem;
        animation: slideUp 0.5s ease-out;
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .section-title {
        font-size: 1.5rem;
        font-weight: bold;
        color: #1e293b;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 3px solid #10b981;
    }

    .reports-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .btn-report {
        padding: 1rem;
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        color: #ffffff;
        border: none;
        border-radius: 10px;
        font-size: 0.95rem;
        font-weight: 600;
        cursor: pointer;
        transition: transform 0.3s, box-shadow 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .btn-report:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(59, 130, 246, 0.4);
    }

    .btn-report.inactive {
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
    }

    .btn-report.inactive:hover {
        box-shadow: 0 5px 15px rgba(245, 158, 11, 0.4);
    }

    .settings-form .form-field {
        margin-bottom: 1.5rem;
    }

    .settings-form label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
        color: #1e293b;
        font-size: 0.95rem;
    }

    .settings-form input,
    .settings-form textarea {
        width: 100%;
        padding: 0.85rem;
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        font-size: 1rem;
        transition: all 0.3s ease;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .settings-form input:focus,
    .settings-form textarea:focus {
        outline: none;
        border-color: #10b981;
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
    }

    .settings-form input[type="file"] {
        padding: 0.6rem;
        cursor: pointer;
    }

    .settings-form textarea {
        resize: vertical;
        min-height: 120px;
    }

    .error-message {
        color: #ef4444;
        font-size: 0.875rem;
        margin-top: 0.5rem;
        display: block;
    }

    .btn-update {
        width: 100%;
        padding: 1rem;
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: #ffffff;
        border: none;
        border-radius: 10px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: transform 0.3s, box-shadow 0.3s;
        margin-top: 1rem;
    }

    .btn-update:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(16, 185, 129, 0.4);
    }

    .danger-zone {
        background: rgba(239, 68, 68, 0.05);
        border: 2px solid rgba(239, 68, 68, 0.2);
        border-radius: 15px;
        padding: 2rem;
        margin-top: 2rem;
    }

    .danger-zone h3 {
        color: #ef4444;
        font-size: 1.25rem;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .danger-zone p {
        color: #64748b;
        margin-bottom: 1rem;
    }

    .btn-logout {
        padding: 0.85rem 1.5rem;
        background: #ef4444;
        color: #ffffff;
        border: none;
        border-radius: 10px;
        font-size: 0.95rem;
        font-weight: 600;
        cursor: pointer;
        transition: transform 0.3s, box-shadow 0.3s;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-logout:hover {
        background: #dc2626;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(239, 68, 68, 0.4);
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
    }

    .form-field.full-width {
        grid-column: 1 / -1;
    }

    @media (max-width: 768px) {
        .settings-container {
            padding: 0 1rem;
        }

        .settings-section {
            padding: 1.5rem;
        }

        .section-title {
            font-size: 1.25rem;
        }

        .reports-grid {
            grid-template-columns: 1fr;
        }

        .form-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="settings-container">
    <!-- Reports Section -->
    <div class="settings-section">
        <h2 class="section-title"><i class="bi bi-file-earmark-bar-graph"></i> Product Reports</h2>
        <div class="reports-grid">
            <form action="{{ route('activeproducts') }}" method="get">
                <button type="submit" class="btn-report">
                    <i class="bi bi-check-circle-fill"></i> Active Products Report
                </button>
            </form>
            <form action="{{ route('unactiveproducts') }}" method="get">
                <button type="submit" class="btn-report inactive">
                    <i class="bi bi-x-circle-fill"></i> Inactive Products Report
                </button>
            </form>
        </div>
    </div>

    <!-- Update Shop Information Section -->
    <div class="settings-section">
        <h2 class="section-title"><i class="bi bi-pencil-square"></i> Update Shop Information</h2>
        <form class="settings-form" method="post" action="{{ route('updateshop', $id) }}" enctype="multipart/form-data">
            @csrf
            <div class="form-grid">
                <div class="form-field">
                    <label for="name">Store Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Enter store name">
                    @error('name')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="numberOfEmployees">Number of Employees</label>
                    <input type="number" id="numberOfEmployees" name="numberOfEmployees" value="{{ old('numberOfEmployees') }}" placeholder="Enter number of employees" min="0">
                    @error('numberOfEmployees')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-field full-width">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" placeholder="Describe your shop">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-field full-width">
                    <label for="logo">Shop Logo</label>
                    <input type="file" id="logo" name="logo" accept="image/*">
                    @error('logo')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div>
                <button type="submit" class="btn-update">
                    <i class="bi bi-save"></i> Update Store
                </button>
            </div>
        </form>
    </div>

    <!-- Danger Zone -->
    <div class="danger-zone">
        <h3><i class="bi bi-exclamation-triangle-fill"></i> Danger Zone</h3>
        <p>Once you logout, you'll need to sign in again to access your dashboard.</p>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="btn-logout">
                <i class="bi bi-box-arrow-right"></i> Log Out
            </button>
        </form>
    </div>
</div>
@endsection