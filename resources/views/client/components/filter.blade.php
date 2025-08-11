 <div class="col-lg-3">
     <div class="card p-3">
         <h5 class="mb-3">Bộ lọc</h5>
         <form action="{{ route('index.index') }}" method="get">
             <label class="form-label fw-bold">Sắp xếp</label>
             <select class="form-select mb-3" name="filter" onchange="this.form.submit()">
                 <option value="">-- Chọn --</option>
                 <option value="price_asc" @selected(request('filter') == 'price_asc')>Giá: Thấp đến Cao</option>
                 <option value="price_desc" @selected(request('filter') == 'price_desc')>Giá: Cao đến Thấp</option>
                 <option value="name_asc" @selected(request('filter') == 'name_asc')>Tên: A-Z</option>
                 <option value="name_desc" @selected(request('filter') == 'name_desc')>Tên: Z-A</option>
             </select>

             {{-- Ví dụ thêm lọc theo giá --}}
             <label class="form-label fw-bold">Khoảng giá</label>
             <input type="number" class="form-control mb-2" name="min_price" placeholder="Từ"
                 value="{{ request('min_price') }}">
             <input type="number" class="form-control mb-3" name="max_price" placeholder="Đến"
                 value="{{ request('max_price') }}">

             <button type="submit" class="btn btn-primary w-100">Lọc</button>
         </form>
     </div>
 </div>
