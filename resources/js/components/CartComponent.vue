<template>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="border">
                <tr class="thead border">
                    <th class="column-title">Изображение</th>
                    <th class="column-title">Товар</th>
                    <th class="column-title">Количество</th>
                    <th class="column-title">Цена</th>
                    <th class="column-title">Сумма</th>
                    <th class="column-title"></th>
                </tr>
            </thead>
            <tbody v-for="product in products">
                <tr class="border">
                    <td class="border-bottom cart-product-img">
                        <a href="">
                            <img :src="'/storage' + product.item.image">
                        </a>
                    </td>
                    <td class="border-bottom product-name">
                        <a href="" class="">
                            <h3>{{ product.item.title }}</h3>
                        </a>
                    </td>
                    <td class="border-bottom">
                        <input type="number" class="form-control" min='1' style="width: 75px;" @change="calculateValues($event.target.value, product.qty, product.item.id)" :value="product.qty">
                    </td>
                    <td class="border-bottom">{{ product.item.price }}</td>
                    <td class="border-bottom">{{ product.price }}</td>
                    <td class="border-bottom delete-from-cart">
                        <button class="btn btn-danger" @click="deleteFromCart(product.item.id)">Удалить</button>
                    </td>
                </tr>
            </tbody>

            <tfoot>
            <tr class="border">
                <th class="column-title">Итого: <span>{{ totalQty }}</span> товара</th>
                <th class="column-title"></th>
                <th class="column-title"></th>
                <th class="column-title"></th>
                <th class="column-title"></th>
                <th class="column-title" style="text-align: center;">Сумма: {{ totalPrice }} <span>TJS</span></th>
            </tr>
            </tfoot>
        </table>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                totalPrice: 0,
                totalQty: 0,
                products: []
            }
        },

        mounted() {
            this.update()
        },

        methods: {
            update: function() {
                axios.get('/cart/get-data').then((response) => {
                    this.totalPrice = response.data.totalPrice
                    this.totalQty = response.data.totalQty
                    this.products = JSON.parse(response.data.products)
                })
            },

            calculateValues: function (currentQty, prevQty, id) {
                let qty = 0
                if (currentQty > prevQty)
                    qty = 1
                else
                    qty = -1


                axios.get('/cart/add/' + id + "?qty=" + qty).then((response) => {
                    this.update()
                });
            },

            deleteFromCart: function (id) {
                axios.get('/cart/delete/' + id).then(() => {
                    this.update()
                });
            }
        }
    }
</script>


<style scoped>
    .cart-product-img a img {
        width: 100px;
    }

    .product-name a h3 {
        font-size: 16px;
        color: #70A221;
    }

    .delete-from-cart a button {
        padding: 6px 30px;
        font-size: 15px;
        background: #dc3545;
        -webkit-box-shadow: inset 0px -2px 4px rgba(0, 0, 0, 0.35);
        box-shadow: inset 0px -2px 4px rgba(0, 0, 0, 0.35);
        border: none;
        color: white;
        -webkit-transition: 0.4s;
        transition: 0.4s;
    }

    .delete-from-cart a button:hover {
        background: red;
    }

</style>
