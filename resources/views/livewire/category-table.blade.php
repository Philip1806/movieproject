<div class="table-responsive">
    <table class="table table-striped table-hover table-lg">
        <thead class="thead-dark">
            <tr>
                <th>Име</th>
                <th style="min-width: 150px;"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td class="align-middle">
                        <div class="d-flex align-items-center">
                            <p class="font-bold ms-3 mb-0">
                                <b>{{ $category->name }}</b>
                            </p>
                        </div>
                    </td>
                    <td class="text-right align-middle">
                        <div class="d-inline-block mb-1">
                            <button type="button" class="btn btn-warning" data-toggle="modal"
                                data-target="#editCategoryModal{{ $category->id }}"><i
                                    class="fa-solid fa-pen-to-square"></i></button>

                            <div wire:ignore.self class="modal fade" id="editCategoryModal{{ $category->id }}"
                                tabindex="-1" role="dialog" aria-labelledby="editCategoryModal{{ $category->id }}"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Редакция на категория</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @livewire('category-edit',['category'=>$category], key($category->id))
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="d-inline-block">
                            <button type="button" wire:click="deleteId({{ $category->id }})" class="btn btn-danger"
                                data-toggle="modal" data-target="#exampleModal"><i
                                    class="fa-solid fa-trash-can"></i></button>
                        </div>

                    </td>
                </tr>
            @empty
                <tr>
                    <td>
                        <b>Няма добавени категории.</b>
                    </td>
                    <td></td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $categories->links() }}
    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Потвърждение</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Сигурни ли сте, че искате да премахнете режисьора завинаги?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Отказ</button>
                    <button type="button" wire:click.prevent="deleteCategory()" class="btn btn-danger close-modal"
                        data-dismiss="modal">Да, премахни го.</button>
                </div>
            </div>
        </div>
    </div>
</div>
