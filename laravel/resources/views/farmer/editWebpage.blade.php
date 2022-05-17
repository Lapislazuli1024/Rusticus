<x-layout>
<div class="container p-5 my-5 container-full">
    <main class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Webpage Bearbeiten</h3>
                    <div class="card-body">
                        <div class="tabcontent" id="divCustomerForm">
                            <form method="POST" action="{{ route('store.webpage.edit') }}" class="formStyle" enctype="multipart/form-data">
                                @csrf
                                <input type="text" class="form-control" name="webpageId" id="webpageId" value="{{ $webpage->id }}" hidden>
                                <div class="form-floating col mb-3">
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Webpage Titel" value="{{ (old('title') !== null) ? old('title') : $webpage->title }}" required autofocus>
                                    <label for="title">Webpage Title</label>
                                    @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="file" class="custom-file-input form-control" id="webpage_image" name="webpage_image" accept="image/*">
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="description" id="description" placeholder="Beschreibung" value="{{ (old('description') !== null) ? old('description') : $webpage->description }}" required>
                                    <label for="description">Beschreibung der Webseite</label>
                                    @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="webpage_url" id="webpage_url" placeholder="URL Webseite" value="{{ (old('webpage_url') !== null) ? old('webpage_url') : $webpage->webpage_url }}" required>
                                    <label for="webpage_url">URL zur eigenen Webseite</label>
                                    @error('webpage_url')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Werte übernehmen</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
</x-layout>