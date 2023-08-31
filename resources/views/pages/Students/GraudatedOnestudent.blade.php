<!-- Graduated one Student -->
<div class="modal fade" id="Graduated{{$student->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ __('Students_trans.graduateStudent') }} </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('GraduateOneStudent')}}" method="post">
                    @csrf
                    <input type="hidden" name="student_id" value="{{$student->id}}">
                    <input type="hidden" name="route" value="0">
                    <h5 style="font-family: 'Cairo', sans-serif;">{{__('Students_trans.areYouSureGraduate')}} {{$student->name}}</h5>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Students_trans.Close')}}</button>
                        <button  class="btn btn-success">{{trans('Students_trans.submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
