@extends('layouts.dashboard.app')

@section('content')

<div class="wrapper ">

    @include('partials.dashboard._sidebar')

    <div class="main-panel">

      @include('partials.dashboard._navbar')

      <div class="content">

        <div class="row">

          <div class="col-md-12">

            <div class="card">

              <div class="card-header">
                <h4 class="card-title">Produtos cadastrados</h4>
              </div>

              <div class="card-body">

                <div class="table-responsive">

                  <table class="table">

                    <thead class="text-primary">
                      <th class="text-center">#</th>
                      <th>Produto</th>
                      <th>Categoria</th>
                      <th>Aprovado?</th>
                      <th class="text-right">Valor</th>
                    </thead>

                    <tbody>

                      <tr>
                        <td class="text-center">
                          1
                        </td>
                        <td>
                          Niger
                        </td>
                        <td>
                          Niger
                        </td>
                        <td>
                          Oud-Turnhout
                        </td>
                        <td class="text-right">
                          $36,738
                        </td>
                      </tr>

                      <tr>
                        <td class="text-center">
                          2
                        </td>
                        <td>
                          Curaçao
                        </td>
                        <td>
                          Niger
                        </td>
                        <td>
                          Sinaai-Waas
                        </td>
                        <td class="text-right">
                          $23,789
                        </td>
                      </tr>

                      <tr>
                        <td class="text-center">
                          3
                        </td>
                        <td>
                          Netherlands
                        </td>
                        <td>
                          Niger
                        </td>
                        <td>
                          Baileux
                        </td>
                        <td class="text-right">
                          $56,142
                        </td>
                      </tr>

                    </tbody>

                  </table>

                </div>

              </div>

            </div>

          </div>

        </div>

      </div>

      @include('partials.dashboard._footer')

    </div>

  </div>

@endsection