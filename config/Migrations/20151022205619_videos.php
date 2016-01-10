<?php
use Migrations\AbstractMigration;

class Videos extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('banners');
        $table
            ->addColumn('nome', 'string', [
                'default' => null,
                'limit' => 90,
                'null' => false,
            ])
            ->addColumn('imagem', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('posicao', 'string', [
                'default' => null,
                'limit' => 2,
                'null' => false,
            ])
            ->addColumn('subtexto', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('textop', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('vis', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('link', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->create();

        $table = $this->table('categorias');
        $table
            ->addColumn('titulo', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('slug', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('texto', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('fotocapa', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addIndex(
                [
                    'titulo',
                ],
                ['unique' => true]
            )
            ->create();

        $table = $this->table('categorias_fotos');
        $table
            ->addColumn('url', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('categoria_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'categoria_id',
                ]
            )
            ->create();

        $table = $this->table('conteudos');
        $table
            ->addColumn('titulo', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('slug', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('chamada', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('conteudo', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('fotocapa', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('categoria_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'categoria_id',
                ]
            )
            ->create();

        $table = $this->table('conteudos_fotos');
        $table
            ->addColumn('url', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('conteudo_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'conteudo_id',
                ]
            )
            ->create();

        $table = $this->table('usuarios');
        $table
            ->addColumn('login', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('senha', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->create();

        $table = $this->table('videos');
        $table
            ->addColumn('titulo', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('url', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $this->table('categorias_fotos')
            ->addForeignKey(
                'categoria_id',
                'categorias',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('conteudos')
            ->addForeignKey(
                'categoria_id',
                'categorias',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('conteudos_fotos')
            ->addForeignKey(
                'conteudo_id',
                'conteudos',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

    }

    public function down()
    {
        $this->table('categorias_fotos')
            ->dropForeignKey(
                'categoria_id'
            )
            ->update();

        $this->table('conteudos')
            ->dropForeignKey(
                'categoria_id'
            )
            ->update();

        $this->table('conteudos_fotos')
            ->dropForeignKey(
                'conteudo_id'
            )
            ->update();

        $this->dropTable('banners');
        $this->dropTable('categorias');
        $this->dropTable('categorias_fotos');
        $this->dropTable('conteudos');
        $this->dropTable('conteudos_fotos');
        $this->dropTable('usuarios');
        $this->dropTable('videos');
    }
}
