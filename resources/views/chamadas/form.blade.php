<div class="row">
    <div class="col-sm-6">
<div class="form-group @if($errors->has('datachamada')) has-error @endif">
    <label for="nome-field">Data:</label>
    <div class="form-group">
        <div class="form-line">
            <input type="date" id="nome-field" name="datachamada" class="form-control" value="{{ old("datachamada") }}" required/>
        </div>
    </div>
    @if($errors->has("datachamada"))
        <span class="help-block">{{ $errors->first("datachamada") }}</span>
    @endif
</div>
</div>
    <div class="col-sm-6">
    <div class="form-group">
        @if( count($turmas)<1 )
            <br>
            <h5 class="red-text">
                Nenhum Turma encontrada!
            </h5>
            <br>
        @else
            <label for="turma">Turma: </label>
            <select class="form-control show-tick" name="turma" id="turma" required>


                @foreach($turmas as $turma)
                    <option value="{{$turma->id}}">{{$turma->nome}}</option>
                @endforeach


            </select>

        @endif

    </div>
</div>
</div>
<br>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group @if($errors->has('visitantes')) has-error @endif">
            <label for="nome-field">Visitantes:</label>
            <div class="form-group">
                <div class="form-line">
                    <input type="text" id="visitantes-field" name="visitantes" onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;" class="form-control" value="{{ old("visitantes") }}" required/>
                </div>
            </div>
            @if($errors->has("visitantes"))
                <span class="help-block">{{ $errors->first("visitantes") }}</span>
            @endif
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group @if($errors->has('biblias')) has-error @endif">
            <label for="nome-field">Bíblias:</label>
            <div class="form-group">
                <div class="form-line">
                    <input type="text" id="biblias-field" name="biblias" onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;" class="form-control" value="{{ old("biblias") }}" required/>
                </div>
            </div>
            @if($errors->has("biblias"))
                <span class="help-block">{{ $errors->first("biblias") }}</span>
            @endif
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group @if($errors->has('revistas')) has-error @endif">
            <label for="nome-field">Revistas:</label>
            <div class="form-group">
                <div class="form-line">
                    <input type="text" id="revistas-field" name="revistas" onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;" class="form-control" value="{{ old("revistas") }}" required/>
                </div>
            </div>
            @if($errors->has("revistas"))
                <span class="help-block">{{ $errors->first("revistas") }}</span>
            @endif
        </div>
    </div>
    <div class="form-group">
</div>

    <div class="col-sm-12">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Criar', ['class' => 'btn btn-primary']) !!}
        <a class="btn btn-link pull-right" href="{{ route('chamadas.index') }}"><i class="material-icons">arrow_back</i></a>
    </div>
</div>
