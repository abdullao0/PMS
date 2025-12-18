@extends('templates.base')

@section('title', 'Shop Dashboard - PMS')

@section('content')
    @push('style')
        <style>
            .dashboard-container {
                max-width: 1200px;
                margin: 2rem auto;
                padding: 0 2rem;
            }

            .dashboard-header {
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

            .dashboard-header h2 {
                font-size: 2rem;
                font-weight: bold;
                color: #1e293b;
                margin-bottom: 0.75rem;
            }

            .dashboard-header p {
                color: #64748b;
                font-size: 1rem;
                margin: 0.5rem 0;
            }

            .dashboard-actions {
                display: flex;
                gap: 1rem;
                margin-bottom: 2rem;
                flex-wrap: wrap;
            }

            .dashboard-actions button {
                background: linear-gradient(135deg, #10b981 0%, #059669 100%);
                color: #ffffff;
                border: none;
                border-radius: 10px;
                padding: 0;
                cursor: pointer;
                transition: transform 0.3s, box-shadow 0.3s;
                overflow: hidden;
            }

            .dashboard-actions button:hover {
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(16, 185, 129, 0.4);
            }

            .dashboard-actions button a {
                display: flex;
                align-items: center;
                gap: 0.5rem;
                padding: 0.85rem 1.5rem;
                color: #ffffff;
                text-decoration: none;
                font-weight: 600;
            }

            .table-container {
                background: #ffffff;
                border-radius: 15px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
                overflow: hidden;
            }

            .products-table {
                width: 100%;
                border-collapse: collapse;
            }

            .products-table thead {
                background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            }

            .products-table thead th {
                padding: 1rem 1.5rem;
                text-align: left;
                font-weight: 600;
                color: #ffffff;
                font-size: 0.9rem;
                text-transform: uppercase;
                letter-spacing: 0.5px;
            }

            .products-table tbody tr {
                border-bottom: 1px solid #e2e8f0;
                transition: background 0.3s;
            }

            .products-table tbody tr:hover {
                background: #f0fdf4;
            }

            .products-table tbody tr:last-child {
                border-bottom: none;
            }

            .products-table tbody td {
                padding: 1rem 1.5rem;
                color: #64748b;
                font-size: 0.95rem;
            }

            .products-table tbody td:first-child {
                color: #1e293b;
                font-weight: 600;
            }

            .products-table tbody .empty-state {
                text-align: center;
                padding: 3rem;
                color: #94a3b8;
                font-style: italic;
            }

            .action-form {
                display: inline;
            }

            .btn-action {
                padding: 0.5rem 1rem;
                border: none;
                border-radius: 8px;
                font-size: 0.9rem;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s;
                display: inline-flex;
                align-items: center;
                gap: 0.35rem;
            }

            .btn-update {
                background: rgba(59, 130, 246, 0.1);
                color: #3b82f6;
            }

            .btn-update:hover {
                background: #3b82f6;
                color: #ffffff;
                transform: translateY(-2px);
            }

            .btn-delete {
                background: rgba(239, 68, 68, 0.1);
                color: #ef4444;
            }

            .btn-delete:hover {
                background: #ef4444;
                color: #ffffff;
                transform: translateY(-2px);
            }

            /* Category Badges */
            .category-badges {
                display: flex;
                flex-wrap: wrap;
                gap: 0.35rem;
            }

            .category-badge {
                background: rgba(16, 185, 129, 0.1);
                color: #10b981;
                padding: 0.25rem 0.65rem;
                border-radius: 50px;
                font-size: 0.8rem;
                font-weight: 600;
                display: inline-block;
            }

            .no-category {
                color: #94a3b8;
                font-style: italic;
                font-size: 0.85rem;
            }

            @media (max-width: 768px) {
                .dashboard-container {
                    padding: 0 1rem;
                }

                .dashboard-header {
                    padding: 1.5rem;
                }

                .dashboard-header h2 {
                    font-size: 1.5rem;
                }

                .dashboard-actions {
                    flex-direction: column;
                }

                .dashboard-actions button {
                    width: 100%;
                }

                .table-container {
                    overflow-x: auto;
                }

                .products-table thead th,
                .products-table tbody td {
                    padding: 0.75rem 1rem;
                    font-size: 0.85rem;
                }
            }
        </style>
    @endpush

    <script>
        function confirmm(button) {
            Swal.fire({
                title: "Are you sure?",
                text: "This product will be deactivated. You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, deactivate it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    // submit the form using the class
                    button.closest('.DA').submit();
                }
            });
        }


    </script>


    @if (session('message'))
        @php
            $msg = session('message');
        @endphp

        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ $msg }}',
                confirmButtonColor: '#10b981'
            });
        </script>
    @endif

    @if (session('error'))
        @php
            $msg = session('error');
        @endphp

        <script>
            Swal.fire({
                icon: 'error',
                title: 'error',
                text: '{{ $msg }}',
                confirmButtonColor: '#b93a10ff'
            });
        </script>
    @endif
    <div class="dashboard-container">
        <div class="dashboard-header">
            <h2><i class="bi bi-shop"></i> {{ $shop->name ?? "go to shop settings to set a name for your shop"}}</h2>
            <p><i class="bi bi-people-fill"></i> <strong>Number Of Employees:</strong>
                {{ $shop->numberOfEmployees ?? "NaN" }}</p>
            <p><i class="bi bi-envelope-fill"></i> <strong>Owner:</strong> {{ $shop->user->name }}</p>
        </div>

        <div class="dashboard-actions">
            <button type="button">
                <a href="{{ route('addproductpage') }}">
                    <i class="bi bi-plus-circle"></i> Add Product
                </a>
            </button>
            <button type="button">
                <a href="{{ route('shopSettingsPage', $shop->id) }}">
                    <i class="bi bi-gear-fill"></i> Shop Settings
                </a>
            </button>
        </div>

        <div class="table-container">
            <table class="products-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Categories</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description ?? "NaN" }}</td>


                            <td>
                                <div class="category-badges">

                                    @forelse($product->categories as $category)
                                        <span class="category-badge">{{ $category->name }}</span>

                                    @empty
                                        <span class="no-category">No category</span>
                                    @endforelse
                            </td>
                            <td>${{ number_format($product->Price, 2) }}</td>
                            <td>{{ $product->QTY }}</td>
                            <td>
                                <form class="action-form" action="{{ route('updateproductpage', $product->id) }}" method="get">
                                    <button type="submit" class="btn-action btn-update">
                                        <i class="bi bi-pencil-square"></i> Update
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form class="DA action-form" action="{{ route('deleteproduct', $product->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="button" class="btn-action btn-delete" onclick="confirmm(this)">
                                        <i class="bi bi-trash-fill"></i> Delete
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="empty-state">
                                <i class="bi bi-inbox" style="font-size: 2rem; display: block; margin-bottom: 0.5rem;"></i>
                                No products yet. Start by adding your first product!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection