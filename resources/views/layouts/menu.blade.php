<aside id="leftsidebar" class="sidebar">
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MENU DE NAVEGAÇÃO</li>

            <li>
                <a href="{{ url('/') }}">
                    <i class="material-icons">home</i>
                    <span>Painel Principal</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/studants') }}">
                    <i class="material-icons">person</i>
                    <span>Alunos</span>
                </a>
            </li>
            <li>
                <a href="{{url('/turmas')}}">
                    <i class="material-icons">class</i>
                    <span>Turmas</span>
                </a>
            </li>
            <li>
                <a href="{{url('/professors')}}">
                    <i class="material-icons">school</i>
                    <span>Professores</span>
                </a>
            </li>
            <li>
                <a href="{{url('/chamadas')}}">
                    <i class="material-icons">record_voice_over</i>
                    <span>Frequência</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">credit_card</i>
                    <span>Gerenciamento de Despesas</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{url('/categorias_despesas')}}">Categorias de Despesas</a>
                    </li>
                    <li>
                        <a href="{{url('/categorias_rendas')}}">Categorias de Rendas</a>
                    </li>
                    <li>
                        <a href="{{url('/despesas')}}">Despesas</a>
                    </li>
                    <li>
                        <a href="{{url('/rendas')}}">Rendas</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">trending_up</i>
                    <span> Relatórios </span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{url('/relatorio_mensal')}}">Financeiro</a>
                    </li>
                    <li>
                        <a href="{{url('/aluno_relatorio')}}">Alunos</a>
                    </li>
                    <li>
                        <a href="{{url('/relatorio_mensal')}}">Matriculas</a>
                    </li>
                    <li>
                        <a href="{{url('/relatorio_mensal')}}">Frequencia</a>
                    </li>
                </ul>
            </li>
            @can('admin')
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">supervisor_account</i>
                    <span>Usuario</span>
                </a>
                <ul class="ml-menu">
                    <li class="{{ Request::is('usuarios*') ? 'active' : '' }}">
                        <a href="{!! url('/listar_usuarios') !!}"><span>Listar Usuários</span></a>
                    </li>

                    <li class="{{ Request::is('usuarios*') ? 'active' : '' }}">
                        <a href="{!! url('/form_novo_rol') !!}"><span>Tipo de Usuário</span></a>
                    </li>

                    <li class="{{ Request::is('usuarios*') ? 'active' : '' }}">
                        <a href="{!! url('/form_novo_permiso') !!}"><span>Permissões</span></a>
                    </li>
                </ul>
            </li>
            @endcan
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2017 <a href="{{url('/')}}">SGEBD</a> - Desenvolvido por João Cruz.
        </div>
        <div class="version">
            <b>Version: </b> 1.5.0
        </div>
    </div>
    <!-- #Footer -->
</aside>