@extends('layouts.frontend.app')
@section('content')
 
    <!-- Single Page Header End -->
    <div class="container-fluid page-header " style="background-image:url('')" >
      
    </div>

    <div class="container-fluid contact py-5" style="height: 500px">
        <div class="container py-5">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">{{ trans('frontend.products') }}</th>
                            <th scope="col">{{ trans('admin.name') }}</th>
                            <th scope="col">{{ trans('frontend.quantity') }}</th>
                            {{-- <th scope="col">Price</th> --}}
                            {{-- <th scope="col">Quantity</th> --}}
                            {{-- <th scope="col">Total</th> --}}
                            <th scope="col">{{ trans('admin.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody id="cart-items">
                   
                    </tbody>
                </table>
            </div>


        </div>
    </div>

@endsection



@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cartItems = document.getElementById('cart-items');

            // استعادة السلة من التخزين المحلي
            let cart = JSON.parse(localStorage.getItem('cart')) || [];

            function updateCartUI() {
                if (cartItems) {
                    cartItems.innerHTML = '';
                    cart.forEach((item, index) => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td scope="row">
                                <div class="d-flex align-items-center">
                                    <img src="${item.image}" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                                </div>
                            </td>
                            <td>
                                <p class="mb-0 mt-4">${item.title}</p>
                            </td>
                            <td>
                                <div class="input-group quantity mt-4" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-minus rounded-circle bg-light border" onclick="updateQuantity(${index}, -1)">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm text-center border-0" value="${item.quantity}" readonly>
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-plus rounded-circle bg-light border" onclick="updateQuantity(${index}, 1)">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-md rounded-circle bg-light border mt-4" onclick="removeFromCart(${index})">
                                    <i class="fa fa-times text-danger"></i>
                                </button>
                            </td>
                        `;
                        cartItems.appendChild(tr);
                    });
                }
            }

            window.updateQuantity = function(index, delta) {
                cart[index].quantity += delta;
                if (cart[index].quantity < 1) cart[index].quantity = 1;
                updateCartUI();
                saveCartToLocalStorage();
            };

            window.removeFromCart = function(index) {
                cart.splice(index, 1);
                updateCartUI();
                saveCartToLocalStorage();
            };

            function saveCartToLocalStorage() {
                localStorage.setItem('cart', JSON.stringify(cart));
            }

            // استعادة حالة السلة عند تحميل الصفحة
            updateCartUI();
        });
    </script>
@endpush
