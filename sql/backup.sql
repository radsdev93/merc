toc.dat                                                                                             0000600 0004000 0002000 00000046322 13606136763 0014461 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        PGDMP       7    	        
         x            merc    9.4.25    9.4.25 H    G           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false         H           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false         I           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                       false         J           1262    32780    merc    DATABASE     v   CREATE DATABASE merc WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'pt_BR.UTF-8' LC_CTYPE = 'pt_BR.UTF-8';
    DROP DATABASE merc;
             postgres    false                     2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
             postgres    false         K           0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                  postgres    false    6         L           0    0    SCHEMA public    ACL     �   REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;
                  postgres    false    6                     3079    11899    plpgsql 	   EXTENSION     ?   CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;
    DROP EXTENSION plpgsql;
                  false         M           0    0    EXTENSION plpgsql    COMMENT     @   COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';
                       false    1         �            1259    32794 
   categorias    TABLE     U   CREATE TABLE public.categorias (
    cid integer NOT NULL,
    nome text NOT NULL
);
    DROP TABLE public.categorias;
       public         postgres    false    6         �            1259    32792    categorias_cid_seq    SEQUENCE     {   CREATE SEQUENCE public.categorias_cid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.categorias_cid_seq;
       public       postgres    false    176    6         N           0    0    categorias_cid_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.categorias_cid_seq OWNED BY public.categorias.cid;
            public       postgres    false    175         �            1259    32826    produtos    TABLE     �   CREATE TABLE public.produtos (
    pid integer NOT NULL,
    nome text NOT NULL,
    descricao text NOT NULL,
    estoque integer NOT NULL,
    preco numeric(10,2) NOT NULL,
    categoria_id integer NOT NULL
);
    DROP TABLE public.produtos;
       public         postgres    false    6         �            1259    32824    produtos_categoria_id_seq    SEQUENCE     �   CREATE SEQUENCE public.produtos_categoria_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE public.produtos_categoria_id_seq;
       public       postgres    false    182    6         O           0    0    produtos_categoria_id_seq    SEQUENCE OWNED BY     W   ALTER SEQUENCE public.produtos_categoria_id_seq OWNED BY public.produtos.categoria_id;
            public       postgres    false    181         �            1259    32822    produtos_pid_seq    SEQUENCE     y   CREATE SEQUENCE public.produtos_pid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.produtos_pid_seq;
       public       postgres    false    182    6         P           0    0    produtos_pid_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.produtos_pid_seq OWNED BY public.produtos.pid;
            public       postgres    false    180         �            1259    32807    tributos    TABLE     �   CREATE TABLE public.tributos (
    tid integer NOT NULL,
    nome text NOT NULL,
    descricao text NOT NULL,
    valor_percentual numeric(10,2) NOT NULL,
    categoria_id integer NOT NULL
);
    DROP TABLE public.tributos;
       public         postgres    false    6         �            1259    32805    tributos_categoria_id_seq    SEQUENCE     �   CREATE SEQUENCE public.tributos_categoria_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE public.tributos_categoria_id_seq;
       public       postgres    false    6    179         Q           0    0    tributos_categoria_id_seq    SEQUENCE OWNED BY     W   ALTER SEQUENCE public.tributos_categoria_id_seq OWNED BY public.tributos.categoria_id;
            public       postgres    false    178         �            1259    32803    tributos_tid_seq    SEQUENCE     y   CREATE SEQUENCE public.tributos_tid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.tributos_tid_seq;
       public       postgres    false    6    179         R           0    0    tributos_tid_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.tributos_tid_seq OWNED BY public.tributos.tid;
            public       postgres    false    177         �            1259    32783    usuarios    TABLE     �   CREATE TABLE public.usuarios (
    uid integer NOT NULL,
    nome text NOT NULL,
    email text NOT NULL,
    senha text NOT NULL,
    nivel text NOT NULL,
    data_cadastro timestamp without time zone NOT NULL
);
    DROP TABLE public.usuarios;
       public         postgres    false    6         �            1259    32781    usuarios_uid_seq    SEQUENCE     y   CREATE SEQUENCE public.usuarios_uid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.usuarios_uid_seq;
       public       postgres    false    174    6         S           0    0    usuarios_uid_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.usuarios_uid_seq OWNED BY public.usuarios.uid;
            public       postgres    false    173         �            1259    32861    venda_produto    TABLE     �   CREATE TABLE public.venda_produto (
    venda_id integer NOT NULL,
    produto_id integer NOT NULL,
    quantidade integer NOT NULL
);
 !   DROP TABLE public.venda_produto;
       public         postgres    false    6         �            1259    32859    venda_produto_produto_id_seq    SEQUENCE     �   CREATE SEQUENCE public.venda_produto_produto_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public.venda_produto_produto_id_seq;
       public       postgres    false    188    6         T           0    0    venda_produto_produto_id_seq    SEQUENCE OWNED BY     ]   ALTER SEQUENCE public.venda_produto_produto_id_seq OWNED BY public.venda_produto.produto_id;
            public       postgres    false    187         �            1259    32857    venda_produto_venda_id_seq    SEQUENCE     �   CREATE SEQUENCE public.venda_produto_venda_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public.venda_produto_venda_id_seq;
       public       postgres    false    188    6         U           0    0    venda_produto_venda_id_seq    SEQUENCE OWNED BY     Y   ALTER SEQUENCE public.venda_produto_venda_id_seq OWNED BY public.venda_produto.venda_id;
            public       postgres    false    186         �            1259    32845    vendas    TABLE       CREATE TABLE public.vendas (
    vid integer NOT NULL,
    usuario_id integer NOT NULL,
    valor_produtos numeric(10,2) NOT NULL,
    valor_tributos numeric(10,2) NOT NULL,
    valor_total numeric(10,2) NOT NULL,
    data_registro timestamp without time zone NOT NULL
);
    DROP TABLE public.vendas;
       public         postgres    false    6         �            1259    32843    vendas_usuario_id_seq    SEQUENCE     ~   CREATE SEQUENCE public.vendas_usuario_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.vendas_usuario_id_seq;
       public       postgres    false    185    6         V           0    0    vendas_usuario_id_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.vendas_usuario_id_seq OWNED BY public.vendas.usuario_id;
            public       postgres    false    184         �            1259    32841    vendas_vid_seq    SEQUENCE     w   CREATE SEQUENCE public.vendas_vid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.vendas_vid_seq;
       public       postgres    false    6    185         W           0    0    vendas_vid_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.vendas_vid_seq OWNED BY public.vendas.vid;
            public       postgres    false    183         �           2604    32797    cid    DEFAULT     p   ALTER TABLE ONLY public.categorias ALTER COLUMN cid SET DEFAULT nextval('public.categorias_cid_seq'::regclass);
 =   ALTER TABLE public.categorias ALTER COLUMN cid DROP DEFAULT;
       public       postgres    false    176    175    176         �           2604    32829    pid    DEFAULT     l   ALTER TABLE ONLY public.produtos ALTER COLUMN pid SET DEFAULT nextval('public.produtos_pid_seq'::regclass);
 ;   ALTER TABLE public.produtos ALTER COLUMN pid DROP DEFAULT;
       public       postgres    false    182    180    182         �           2604    32830    categoria_id    DEFAULT     ~   ALTER TABLE ONLY public.produtos ALTER COLUMN categoria_id SET DEFAULT nextval('public.produtos_categoria_id_seq'::regclass);
 D   ALTER TABLE public.produtos ALTER COLUMN categoria_id DROP DEFAULT;
       public       postgres    false    182    181    182         �           2604    32810    tid    DEFAULT     l   ALTER TABLE ONLY public.tributos ALTER COLUMN tid SET DEFAULT nextval('public.tributos_tid_seq'::regclass);
 ;   ALTER TABLE public.tributos ALTER COLUMN tid DROP DEFAULT;
       public       postgres    false    177    179    179         �           2604    32811    categoria_id    DEFAULT     ~   ALTER TABLE ONLY public.tributos ALTER COLUMN categoria_id SET DEFAULT nextval('public.tributos_categoria_id_seq'::regclass);
 D   ALTER TABLE public.tributos ALTER COLUMN categoria_id DROP DEFAULT;
       public       postgres    false    179    178    179         �           2604    32786    uid    DEFAULT     l   ALTER TABLE ONLY public.usuarios ALTER COLUMN uid SET DEFAULT nextval('public.usuarios_uid_seq'::regclass);
 ;   ALTER TABLE public.usuarios ALTER COLUMN uid DROP DEFAULT;
       public       postgres    false    173    174    174         �           2604    32864    venda_id    DEFAULT     �   ALTER TABLE ONLY public.venda_produto ALTER COLUMN venda_id SET DEFAULT nextval('public.venda_produto_venda_id_seq'::regclass);
 E   ALTER TABLE public.venda_produto ALTER COLUMN venda_id DROP DEFAULT;
       public       postgres    false    188    186    188         �           2604    32865 
   produto_id    DEFAULT     �   ALTER TABLE ONLY public.venda_produto ALTER COLUMN produto_id SET DEFAULT nextval('public.venda_produto_produto_id_seq'::regclass);
 G   ALTER TABLE public.venda_produto ALTER COLUMN produto_id DROP DEFAULT;
       public       postgres    false    188    187    188         �           2604    32848    vid    DEFAULT     h   ALTER TABLE ONLY public.vendas ALTER COLUMN vid SET DEFAULT nextval('public.vendas_vid_seq'::regclass);
 9   ALTER TABLE public.vendas ALTER COLUMN vid DROP DEFAULT;
       public       postgres    false    183    185    185         �           2604    32849 
   usuario_id    DEFAULT     v   ALTER TABLE ONLY public.vendas ALTER COLUMN usuario_id SET DEFAULT nextval('public.vendas_usuario_id_seq'::regclass);
 @   ALTER TABLE public.vendas ALTER COLUMN usuario_id DROP DEFAULT;
       public       postgres    false    184    185    185         8          0    32794 
   categorias 
   TABLE DATA               /   COPY public.categorias (cid, nome) FROM stdin;
    public       postgres    false    176       2104.dat X           0    0    categorias_cid_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.categorias_cid_seq', 4, true);
            public       postgres    false    175         >          0    32826    produtos 
   TABLE DATA               V   COPY public.produtos (pid, nome, descricao, estoque, preco, categoria_id) FROM stdin;
    public       postgres    false    182       2110.dat Y           0    0    produtos_categoria_id_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('public.produtos_categoria_id_seq', 1, false);
            public       postgres    false    181         Z           0    0    produtos_pid_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.produtos_pid_seq', 9, true);
            public       postgres    false    180         ;          0    32807    tributos 
   TABLE DATA               X   COPY public.tributos (tid, nome, descricao, valor_percentual, categoria_id) FROM stdin;
    public       postgres    false    179       2107.dat [           0    0    tributos_categoria_id_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('public.tributos_categoria_id_seq', 1, false);
            public       postgres    false    178         \           0    0    tributos_tid_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.tributos_tid_seq', 2, true);
            public       postgres    false    177         6          0    32783    usuarios 
   TABLE DATA               Q   COPY public.usuarios (uid, nome, email, senha, nivel, data_cadastro) FROM stdin;
    public       postgres    false    174       2102.dat ]           0    0    usuarios_uid_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.usuarios_uid_seq', 2, true);
            public       postgres    false    173         D          0    32861    venda_produto 
   TABLE DATA               I   COPY public.venda_produto (venda_id, produto_id, quantidade) FROM stdin;
    public       postgres    false    188       2116.dat ^           0    0    venda_produto_produto_id_seq    SEQUENCE SET     K   SELECT pg_catalog.setval('public.venda_produto_produto_id_seq', 1, false);
            public       postgres    false    187         _           0    0    venda_produto_venda_id_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public.venda_produto_venda_id_seq', 1, false);
            public       postgres    false    186         A          0    32845    vendas 
   TABLE DATA               m   COPY public.vendas (vid, usuario_id, valor_produtos, valor_tributos, valor_total, data_registro) FROM stdin;
    public       postgres    false    185       2113.dat `           0    0    vendas_usuario_id_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.vendas_usuario_id_seq', 1, false);
            public       postgres    false    184         a           0    0    vendas_vid_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.vendas_vid_seq', 13, true);
            public       postgres    false    183         �           2606    32802    categorias_pkey 
   CONSTRAINT     Y   ALTER TABLE ONLY public.categorias
    ADD CONSTRAINT categorias_pkey PRIMARY KEY (cid);
 D   ALTER TABLE ONLY public.categorias DROP CONSTRAINT categorias_pkey;
       public         postgres    false    176    176         �           2606    32835    produtos_pkey 
   CONSTRAINT     U   ALTER TABLE ONLY public.produtos
    ADD CONSTRAINT produtos_pkey PRIMARY KEY (pid);
 @   ALTER TABLE ONLY public.produtos DROP CONSTRAINT produtos_pkey;
       public         postgres    false    182    182         �           2606    32816    tributos_pkey 
   CONSTRAINT     U   ALTER TABLE ONLY public.tributos
    ADD CONSTRAINT tributos_pkey PRIMARY KEY (tid);
 @   ALTER TABLE ONLY public.tributos DROP CONSTRAINT tributos_pkey;
       public         postgres    false    179    179         �           2606    32791    usuarios_pkey 
   CONSTRAINT     U   ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (uid);
 @   ALTER TABLE ONLY public.usuarios DROP CONSTRAINT usuarios_pkey;
       public         postgres    false    174    174         �           2606    32867    venda_produto_pkey 
   CONSTRAINT     p   ALTER TABLE ONLY public.venda_produto
    ADD CONSTRAINT venda_produto_pkey PRIMARY KEY (venda_id, produto_id);
 J   ALTER TABLE ONLY public.venda_produto DROP CONSTRAINT venda_produto_pkey;
       public         postgres    false    188    188    188         �           2606    32851    vendas_pkey 
   CONSTRAINT     Q   ALTER TABLE ONLY public.vendas
    ADD CONSTRAINT vendas_pkey PRIMARY KEY (vid);
 <   ALTER TABLE ONLY public.vendas DROP CONSTRAINT vendas_pkey;
       public         postgres    false    185    185         �           2606    32836    fk_produto_categoria_id    FK CONSTRAINT     �   ALTER TABLE ONLY public.produtos
    ADD CONSTRAINT fk_produto_categoria_id FOREIGN KEY (categoria_id) REFERENCES public.categorias(cid);
 J   ALTER TABLE ONLY public.produtos DROP CONSTRAINT fk_produto_categoria_id;
       public       postgres    false    176    1978    182         �           2606    32817    fk_tributo_categoria_id    FK CONSTRAINT     �   ALTER TABLE ONLY public.tributos
    ADD CONSTRAINT fk_tributo_categoria_id FOREIGN KEY (categoria_id) REFERENCES public.categorias(cid);
 J   ALTER TABLE ONLY public.tributos DROP CONSTRAINT fk_tributo_categoria_id;
       public       postgres    false    179    176    1978         �           2606    32873    fk_venda_produto_produto_id    FK CONSTRAINT     �   ALTER TABLE ONLY public.venda_produto
    ADD CONSTRAINT fk_venda_produto_produto_id FOREIGN KEY (produto_id) REFERENCES public.produtos(pid);
 S   ALTER TABLE ONLY public.venda_produto DROP CONSTRAINT fk_venda_produto_produto_id;
       public       postgres    false    182    188    1982         �           2606    32868    fk_venda_produto_venda_id    FK CONSTRAINT     �   ALTER TABLE ONLY public.venda_produto
    ADD CONSTRAINT fk_venda_produto_venda_id FOREIGN KEY (venda_id) REFERENCES public.vendas(vid);
 Q   ALTER TABLE ONLY public.venda_produto DROP CONSTRAINT fk_venda_produto_venda_id;
       public       postgres    false    185    188    1984         �           2606    32852    fk_venda_usuario_id    FK CONSTRAINT     �   ALTER TABLE ONLY public.vendas
    ADD CONSTRAINT fk_venda_usuario_id FOREIGN KEY (usuario_id) REFERENCES public.usuarios(uid);
 D   ALTER TABLE ONLY public.vendas DROP CONSTRAINT fk_venda_usuario_id;
       public       postgres    false    1976    174    185                                                                                                                                                                                                                                                                                                                      2104.dat                                                                                            0000600 0004000 0002000 00000000052 13606136763 0014250 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	Categoria Padrão
4	Categoria Nova
\.


                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      2110.dat                                                                                            0000600 0004000 0002000 00000000511 13606136763 0014245 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	Produto de Teste	Produto de teste com descrição detalhada. 500g/pct	10	29.97	1
4	Produto de Teste 2	Mais um produto de teste de excelente qualidade. 1kg.	10	15.98	1
5	Produto de Teste 3	Fardo 25kg	10	450.00	1
6	Produto de Teste 4	Headset fabricação nacional.	10	45.63	1
7	Produto de Teste 5	Jogo incrível.	10	78.36	4
\.


                                                                                                                                                                                       2107.dat                                                                                            0000600 0004000 0002000 00000000126 13606136763 0014255 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	Tributo de Teste	Tributo de teste.	1.97	1
2	Tributo Novo	Novo tributo.	20.00	4
\.


                                                                                                                                                                                                                                                                                                                                                                                                                                          2102.dat                                                                                            0000600 0004000 0002000 00000000366 13606136763 0014256 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	Merc Admin	admin@merc.com	$2y$10$dO5gWknnzoqxo.JjuTTCf.3pXPYumPUm9qhVFFL2Gldo3mCwyl4VK	Administrador	2020-01-01 00:00:00
2	Merc Operador	op@merc.com	$2y$10$/.AzS3td4hpzrnWKXiIaPemaiYqJJxIMEe8TZijVcjDNysmznGjAO	Operador	2020-01-10 03:01:25
\.


                                                                                                                                                                                                                                                                          2116.dat                                                                                            0000600 0004000 0002000 00000000057 13606136763 0014260 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        12	1	1
12	4	1
12	5	1
12	6	1
12	7	1
13	7	1
\.


                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 2113.dat                                                                                            0000600 0004000 0002000 00000000135 13606136763 0014252 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        12	1	619.94	12.21	632.15	2020-01-10 02:08:44
13	1	78.36	15.67	94.03	2020-01-10 03:05:58
\.


                                                                                                                                                                                                                                                                                                                                                                                                                                   restore.sql                                                                                         0000600 0004000 0002000 00000041454 13606136763 0015407 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        --
-- NOTE:
--
-- File paths need to be edited. Search for $$PATH$$ and
-- replace it with the path to the directory containing
-- the extracted data files.
--
--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;

ALTER TABLE ONLY public.vendas DROP CONSTRAINT fk_venda_usuario_id;
ALTER TABLE ONLY public.venda_produto DROP CONSTRAINT fk_venda_produto_venda_id;
ALTER TABLE ONLY public.venda_produto DROP CONSTRAINT fk_venda_produto_produto_id;
ALTER TABLE ONLY public.tributos DROP CONSTRAINT fk_tributo_categoria_id;
ALTER TABLE ONLY public.produtos DROP CONSTRAINT fk_produto_categoria_id;
ALTER TABLE ONLY public.vendas DROP CONSTRAINT vendas_pkey;
ALTER TABLE ONLY public.venda_produto DROP CONSTRAINT venda_produto_pkey;
ALTER TABLE ONLY public.usuarios DROP CONSTRAINT usuarios_pkey;
ALTER TABLE ONLY public.tributos DROP CONSTRAINT tributos_pkey;
ALTER TABLE ONLY public.produtos DROP CONSTRAINT produtos_pkey;
ALTER TABLE ONLY public.categorias DROP CONSTRAINT categorias_pkey;
ALTER TABLE public.vendas ALTER COLUMN usuario_id DROP DEFAULT;
ALTER TABLE public.vendas ALTER COLUMN vid DROP DEFAULT;
ALTER TABLE public.venda_produto ALTER COLUMN produto_id DROP DEFAULT;
ALTER TABLE public.venda_produto ALTER COLUMN venda_id DROP DEFAULT;
ALTER TABLE public.usuarios ALTER COLUMN uid DROP DEFAULT;
ALTER TABLE public.tributos ALTER COLUMN categoria_id DROP DEFAULT;
ALTER TABLE public.tributos ALTER COLUMN tid DROP DEFAULT;
ALTER TABLE public.produtos ALTER COLUMN categoria_id DROP DEFAULT;
ALTER TABLE public.produtos ALTER COLUMN pid DROP DEFAULT;
ALTER TABLE public.categorias ALTER COLUMN cid DROP DEFAULT;
DROP SEQUENCE public.vendas_vid_seq;
DROP SEQUENCE public.vendas_usuario_id_seq;
DROP TABLE public.vendas;
DROP SEQUENCE public.venda_produto_venda_id_seq;
DROP SEQUENCE public.venda_produto_produto_id_seq;
DROP TABLE public.venda_produto;
DROP SEQUENCE public.usuarios_uid_seq;
DROP TABLE public.usuarios;
DROP SEQUENCE public.tributos_tid_seq;
DROP SEQUENCE public.tributos_categoria_id_seq;
DROP TABLE public.tributos;
DROP SEQUENCE public.produtos_pid_seq;
DROP SEQUENCE public.produtos_categoria_id_seq;
DROP TABLE public.produtos;
DROP SEQUENCE public.categorias_cid_seq;
DROP TABLE public.categorias;
DROP EXTENSION plpgsql;
DROP SCHEMA public;
--
-- Name: public; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA public;


ALTER SCHEMA public OWNER TO postgres;

--
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON SCHEMA public IS 'standard public schema';


--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: categorias; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.categorias (
    cid integer NOT NULL,
    nome text NOT NULL
);


ALTER TABLE public.categorias OWNER TO postgres;

--
-- Name: categorias_cid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.categorias_cid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.categorias_cid_seq OWNER TO postgres;

--
-- Name: categorias_cid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.categorias_cid_seq OWNED BY public.categorias.cid;


--
-- Name: produtos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.produtos (
    pid integer NOT NULL,
    nome text NOT NULL,
    descricao text NOT NULL,
    estoque integer NOT NULL,
    preco numeric(10,2) NOT NULL,
    categoria_id integer NOT NULL
);


ALTER TABLE public.produtos OWNER TO postgres;

--
-- Name: produtos_categoria_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.produtos_categoria_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.produtos_categoria_id_seq OWNER TO postgres;

--
-- Name: produtos_categoria_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.produtos_categoria_id_seq OWNED BY public.produtos.categoria_id;


--
-- Name: produtos_pid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.produtos_pid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.produtos_pid_seq OWNER TO postgres;

--
-- Name: produtos_pid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.produtos_pid_seq OWNED BY public.produtos.pid;


--
-- Name: tributos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.tributos (
    tid integer NOT NULL,
    nome text NOT NULL,
    descricao text NOT NULL,
    valor_percentual numeric(10,2) NOT NULL,
    categoria_id integer NOT NULL
);


ALTER TABLE public.tributos OWNER TO postgres;

--
-- Name: tributos_categoria_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tributos_categoria_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tributos_categoria_id_seq OWNER TO postgres;

--
-- Name: tributos_categoria_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tributos_categoria_id_seq OWNED BY public.tributos.categoria_id;


--
-- Name: tributos_tid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tributos_tid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tributos_tid_seq OWNER TO postgres;

--
-- Name: tributos_tid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tributos_tid_seq OWNED BY public.tributos.tid;


--
-- Name: usuarios; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.usuarios (
    uid integer NOT NULL,
    nome text NOT NULL,
    email text NOT NULL,
    senha text NOT NULL,
    nivel text NOT NULL,
    data_cadastro timestamp without time zone NOT NULL
);


ALTER TABLE public.usuarios OWNER TO postgres;

--
-- Name: usuarios_uid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.usuarios_uid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuarios_uid_seq OWNER TO postgres;

--
-- Name: usuarios_uid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.usuarios_uid_seq OWNED BY public.usuarios.uid;


--
-- Name: venda_produto; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.venda_produto (
    venda_id integer NOT NULL,
    produto_id integer NOT NULL,
    quantidade integer NOT NULL
);


ALTER TABLE public.venda_produto OWNER TO postgres;

--
-- Name: venda_produto_produto_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.venda_produto_produto_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.venda_produto_produto_id_seq OWNER TO postgres;

--
-- Name: venda_produto_produto_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.venda_produto_produto_id_seq OWNED BY public.venda_produto.produto_id;


--
-- Name: venda_produto_venda_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.venda_produto_venda_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.venda_produto_venda_id_seq OWNER TO postgres;

--
-- Name: venda_produto_venda_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.venda_produto_venda_id_seq OWNED BY public.venda_produto.venda_id;


--
-- Name: vendas; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.vendas (
    vid integer NOT NULL,
    usuario_id integer NOT NULL,
    valor_produtos numeric(10,2) NOT NULL,
    valor_tributos numeric(10,2) NOT NULL,
    valor_total numeric(10,2) NOT NULL,
    data_registro timestamp without time zone NOT NULL
);


ALTER TABLE public.vendas OWNER TO postgres;

--
-- Name: vendas_usuario_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.vendas_usuario_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.vendas_usuario_id_seq OWNER TO postgres;

--
-- Name: vendas_usuario_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.vendas_usuario_id_seq OWNED BY public.vendas.usuario_id;


--
-- Name: vendas_vid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.vendas_vid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.vendas_vid_seq OWNER TO postgres;

--
-- Name: vendas_vid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.vendas_vid_seq OWNED BY public.vendas.vid;


--
-- Name: cid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categorias ALTER COLUMN cid SET DEFAULT nextval('public.categorias_cid_seq'::regclass);


--
-- Name: pid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produtos ALTER COLUMN pid SET DEFAULT nextval('public.produtos_pid_seq'::regclass);


--
-- Name: categoria_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produtos ALTER COLUMN categoria_id SET DEFAULT nextval('public.produtos_categoria_id_seq'::regclass);


--
-- Name: tid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tributos ALTER COLUMN tid SET DEFAULT nextval('public.tributos_tid_seq'::regclass);


--
-- Name: categoria_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tributos ALTER COLUMN categoria_id SET DEFAULT nextval('public.tributos_categoria_id_seq'::regclass);


--
-- Name: uid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuarios ALTER COLUMN uid SET DEFAULT nextval('public.usuarios_uid_seq'::regclass);


--
-- Name: venda_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.venda_produto ALTER COLUMN venda_id SET DEFAULT nextval('public.venda_produto_venda_id_seq'::regclass);


--
-- Name: produto_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.venda_produto ALTER COLUMN produto_id SET DEFAULT nextval('public.venda_produto_produto_id_seq'::regclass);


--
-- Name: vid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vendas ALTER COLUMN vid SET DEFAULT nextval('public.vendas_vid_seq'::regclass);


--
-- Name: usuario_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vendas ALTER COLUMN usuario_id SET DEFAULT nextval('public.vendas_usuario_id_seq'::regclass);


--
-- Data for Name: categorias; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.categorias (cid, nome) FROM stdin;
\.
COPY public.categorias (cid, nome) FROM '$$PATH$$/2104.dat';

--
-- Name: categorias_cid_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.categorias_cid_seq', 4, true);


--
-- Data for Name: produtos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.produtos (pid, nome, descricao, estoque, preco, categoria_id) FROM stdin;
\.
COPY public.produtos (pid, nome, descricao, estoque, preco, categoria_id) FROM '$$PATH$$/2110.dat';

--
-- Name: produtos_categoria_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.produtos_categoria_id_seq', 1, false);


--
-- Name: produtos_pid_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.produtos_pid_seq', 9, true);


--
-- Data for Name: tributos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tributos (tid, nome, descricao, valor_percentual, categoria_id) FROM stdin;
\.
COPY public.tributos (tid, nome, descricao, valor_percentual, categoria_id) FROM '$$PATH$$/2107.dat';

--
-- Name: tributos_categoria_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tributos_categoria_id_seq', 1, false);


--
-- Name: tributos_tid_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tributos_tid_seq', 2, true);


--
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.usuarios (uid, nome, email, senha, nivel, data_cadastro) FROM stdin;
\.
COPY public.usuarios (uid, nome, email, senha, nivel, data_cadastro) FROM '$$PATH$$/2102.dat';

--
-- Name: usuarios_uid_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuarios_uid_seq', 2, true);


--
-- Data for Name: venda_produto; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.venda_produto (venda_id, produto_id, quantidade) FROM stdin;
\.
COPY public.venda_produto (venda_id, produto_id, quantidade) FROM '$$PATH$$/2116.dat';

--
-- Name: venda_produto_produto_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.venda_produto_produto_id_seq', 1, false);


--
-- Name: venda_produto_venda_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.venda_produto_venda_id_seq', 1, false);


--
-- Data for Name: vendas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.vendas (vid, usuario_id, valor_produtos, valor_tributos, valor_total, data_registro) FROM stdin;
\.
COPY public.vendas (vid, usuario_id, valor_produtos, valor_tributos, valor_total, data_registro) FROM '$$PATH$$/2113.dat';

--
-- Name: vendas_usuario_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.vendas_usuario_id_seq', 1, false);


--
-- Name: vendas_vid_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.vendas_vid_seq', 13, true);


--
-- Name: categorias_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.categorias
    ADD CONSTRAINT categorias_pkey PRIMARY KEY (cid);


--
-- Name: produtos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.produtos
    ADD CONSTRAINT produtos_pkey PRIMARY KEY (pid);


--
-- Name: tributos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.tributos
    ADD CONSTRAINT tributos_pkey PRIMARY KEY (tid);


--
-- Name: usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (uid);


--
-- Name: venda_produto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.venda_produto
    ADD CONSTRAINT venda_produto_pkey PRIMARY KEY (venda_id, produto_id);


--
-- Name: vendas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.vendas
    ADD CONSTRAINT vendas_pkey PRIMARY KEY (vid);


--
-- Name: fk_produto_categoria_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produtos
    ADD CONSTRAINT fk_produto_categoria_id FOREIGN KEY (categoria_id) REFERENCES public.categorias(cid);


--
-- Name: fk_tributo_categoria_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tributos
    ADD CONSTRAINT fk_tributo_categoria_id FOREIGN KEY (categoria_id) REFERENCES public.categorias(cid);


--
-- Name: fk_venda_produto_produto_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.venda_produto
    ADD CONSTRAINT fk_venda_produto_produto_id FOREIGN KEY (produto_id) REFERENCES public.produtos(pid);


--
-- Name: fk_venda_produto_venda_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.venda_produto
    ADD CONSTRAINT fk_venda_produto_venda_id FOREIGN KEY (venda_id) REFERENCES public.vendas(vid);


--
-- Name: fk_venda_usuario_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vendas
    ADD CONSTRAINT fk_venda_usuario_id FOREIGN KEY (usuario_id) REFERENCES public.usuarios(uid);


--
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    