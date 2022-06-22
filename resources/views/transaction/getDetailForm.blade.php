<div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Details Medicine Transaction</h4>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Generic Name</th>
                                    <th>Formula</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>SubTotal</th>
                                </tr>
                            </thead>
                            <tbody>
                       

                                    @for ($key = 0; $key < count($products); $key++)
                                        <tr>
                                            <td><img src="{{ asset('medicines_img/' . $products[$key]['image']) }}"
                                                    style="width:100px; height:100px;"></td>
                                            <td>{{ $products[$key]['generic_name'] }}</td>
                                            <td>{{ $products[$key]['form'] }}</td>
                                            <td>{{ $data[$key]['price'] }}</td>
                                            <td>{{ $data[$key]['quantity'] }}</td>
                                            <td>{{ $data[$key]['subtotal'] }}</td>
                                        </tr>
                                    @endfor

                            </tbody>
                        </table>
                    </div>

 <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
</div>