<form action="{{ route('divisi.update', $divisi->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="nama_divisi">Nama Divisi</label>
        <input
            type="text"
            name="nama_divisi"
            id="nama_divisi"
            value="{{ old('nama_divisi', $divisi->nama_divisi) }}"
            required
        >
        @error('nama_divisi')
            <span style="color: red;">{{ $message }}</span>
        @enderror
    </div>

    <button type="submit">Simpan Perubahan</button>
    <a href="{{ route('divisi.index') }}">Batal</a>
</form>