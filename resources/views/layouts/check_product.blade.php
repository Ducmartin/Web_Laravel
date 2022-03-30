<div class="section" id="filter-product-wp">
    <div class="section-head">
        <h3 class="section-title">Bộ lọc</h3>
    </div>
    <div class="section-detail">
        <form method="POST" action="{{ Route('display.check_product') }}">
            @csrf
            @csrf
            <table>
                <thead>
                    <tr>
                        <td colspan="2">Giá</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($check_prices as $item)
                        @if (isset($price) && $price == $item->slug)
                            <tr>
                                <td><input checked type="radio" name="price" id="{{ $item->id }}"
                                        value="{{ $item->id }}"></td>
                                <td><label for="{{ $item->id }}">{{ $item->name }}</label></td>
                            </tr>
                        @else
                            <tr>
                                <td><input type="radio" name="price" id="{{ $item->id }}"
                                        value="{{ $item->id }}"></td>
                                <td><label for="{{ $item->id }}">{{ $item->name }}</label></td>
                            </tr>
                        @endif

                    @endforeach
                </tbody>
            </table>
            @if(isset($trademarks))
            <table>
                <thead>
                    <tr>
                        <td colspan="2">Hãng</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trademarks as $trademark)

                        @if ($name == $trademark->slug)
                            <tr>
                                <td><input checked type="radio" name="trademark" value="{{ $trademark->id }}"
                                        id="{{ $trademark->id }}"></td>
                                <td><label for="{{ $trademark->id }}">{{ $trademark->name }}</label></td>
                            </tr>
                        @else
                            <tr>
                                <td><input type="radio" name="trademark" value="{{ $trademark->id }}"
                                        id="{{ $trademark->id }}"></td>
                                <td><label for="{{ $trademark->id }}">{{ $trademark->name }}</label></td>
                            </tr>
                        @endif
                    @endforeach

                </tbody>
            </table>
            @endif
            <table>
                <thead>
                    <tr>
                        <td colspan="2"><button type="submit"
                                style="width:100%;background:#bebebe;border:1px solid #bebebe">Áp dụng</button></td>
                    </tr>
                </thead>

            </table>

        </form>
    </div>
</div>
