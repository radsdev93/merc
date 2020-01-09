--
-- PostgreSQL database dump
--

-- Dumped from database version 9.4.25
-- Dumped by pg_dump version 9.4.25
-- Started on 2020-01-09 06:35:35 -03

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;

--
-- TOC entry 1 (class 3079 OID 11897)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2123 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 176 (class 1259 OID 25616)
-- Name: categorias; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.categorias (
    cid integer NOT NULL,
    nome text NOT NULL
);


ALTER TABLE public.categorias OWNER TO postgres;

--
-- TOC entry 175 (class 1259 OID 25614)
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
-- TOC entry 2124 (class 0 OID 0)
-- Dependencies: 175
-- Name: categorias_cid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.categorias_cid_seq OWNED BY public.categorias.cid;


--
-- TOC entry 182 (class 1259 OID 25648)
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
-- TOC entry 181 (class 1259 OID 25646)
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
-- TOC entry 2125 (class 0 OID 0)
-- Dependencies: 181
-- Name: produtos_categoria_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.produtos_categoria_id_seq OWNED BY public.produtos.categoria_id;


--
-- TOC entry 180 (class 1259 OID 25644)
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
-- TOC entry 2126 (class 0 OID 0)
-- Dependencies: 180
-- Name: produtos_pid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.produtos_pid_seq OWNED BY public.produtos.pid;


--
-- TOC entry 179 (class 1259 OID 25629)
-- Name: tributos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.tributos (
    tid integer NOT NULL,
    nome text NOT NULL,
    descricao text NOT NULL,
    valor_percentual numeric(3,2) NOT NULL,
    categoria_id integer NOT NULL
);


ALTER TABLE public.tributos OWNER TO postgres;

--
-- TOC entry 178 (class 1259 OID 25627)
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
-- TOC entry 2127 (class 0 OID 0)
-- Dependencies: 178
-- Name: tributos_categoria_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tributos_categoria_id_seq OWNED BY public.tributos.categoria_id;


--
-- TOC entry 177 (class 1259 OID 25625)
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
-- TOC entry 2128 (class 0 OID 0)
-- Dependencies: 177
-- Name: tributos_tid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tributos_tid_seq OWNED BY public.tributos.tid;


--
-- TOC entry 174 (class 1259 OID 25605)
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
-- TOC entry 173 (class 1259 OID 25603)
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
-- TOC entry 2129 (class 0 OID 0)
-- Dependencies: 173
-- Name: usuarios_uid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.usuarios_uid_seq OWNED BY public.usuarios.uid;


--
-- TOC entry 188 (class 1259 OID 25683)
-- Name: venda_produto; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.venda_produto (
    venda_id integer NOT NULL,
    produto_id integer NOT NULL,
    quantidade integer NOT NULL
);


ALTER TABLE public.venda_produto OWNER TO postgres;

--
-- TOC entry 187 (class 1259 OID 25681)
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
-- TOC entry 2130 (class 0 OID 0)
-- Dependencies: 187
-- Name: venda_produto_produto_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.venda_produto_produto_id_seq OWNED BY public.venda_produto.produto_id;


--
-- TOC entry 186 (class 1259 OID 25679)
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
-- TOC entry 2131 (class 0 OID 0)
-- Dependencies: 186
-- Name: venda_produto_venda_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.venda_produto_venda_id_seq OWNED BY public.venda_produto.venda_id;


--
-- TOC entry 185 (class 1259 OID 25667)
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
-- TOC entry 184 (class 1259 OID 25665)
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
-- TOC entry 2132 (class 0 OID 0)
-- Dependencies: 184
-- Name: vendas_usuario_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.vendas_usuario_id_seq OWNED BY public.vendas.usuario_id;


--
-- TOC entry 183 (class 1259 OID 25663)
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
-- TOC entry 2133 (class 0 OID 0)
-- Dependencies: 183
-- Name: vendas_vid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.vendas_vid_seq OWNED BY public.vendas.vid;


--
-- TOC entry 1964 (class 2604 OID 25619)
-- Name: cid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categorias ALTER COLUMN cid SET DEFAULT nextval('public.categorias_cid_seq'::regclass);


--
-- TOC entry 1967 (class 2604 OID 25651)
-- Name: pid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produtos ALTER COLUMN pid SET DEFAULT nextval('public.produtos_pid_seq'::regclass);


--
-- TOC entry 1968 (class 2604 OID 25652)
-- Name: categoria_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produtos ALTER COLUMN categoria_id SET DEFAULT nextval('public.produtos_categoria_id_seq'::regclass);


--
-- TOC entry 1965 (class 2604 OID 25632)
-- Name: tid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tributos ALTER COLUMN tid SET DEFAULT nextval('public.tributos_tid_seq'::regclass);


--
-- TOC entry 1966 (class 2604 OID 25633)
-- Name: categoria_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tributos ALTER COLUMN categoria_id SET DEFAULT nextval('public.tributos_categoria_id_seq'::regclass);


--
-- TOC entry 1963 (class 2604 OID 25608)
-- Name: uid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuarios ALTER COLUMN uid SET DEFAULT nextval('public.usuarios_uid_seq'::regclass);


--
-- TOC entry 1971 (class 2604 OID 25686)
-- Name: venda_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.venda_produto ALTER COLUMN venda_id SET DEFAULT nextval('public.venda_produto_venda_id_seq'::regclass);


--
-- TOC entry 1972 (class 2604 OID 25687)
-- Name: produto_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.venda_produto ALTER COLUMN produto_id SET DEFAULT nextval('public.venda_produto_produto_id_seq'::regclass);


--
-- TOC entry 1969 (class 2604 OID 25670)
-- Name: vid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vendas ALTER COLUMN vid SET DEFAULT nextval('public.vendas_vid_seq'::regclass);


--
-- TOC entry 1970 (class 2604 OID 25671)
-- Name: usuario_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vendas ALTER COLUMN usuario_id SET DEFAULT nextval('public.vendas_usuario_id_seq'::regclass);


--
-- TOC entry 2102 (class 0 OID 25616)
-- Dependencies: 176
-- Data for Name: categorias; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.categorias (cid, nome) FROM stdin;
1	Categoria Base
\.


--
-- TOC entry 2134 (class 0 OID 0)
-- Dependencies: 175
-- Name: categorias_cid_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.categorias_cid_seq', 7, true);


--
-- TOC entry 2108 (class 0 OID 25648)
-- Dependencies: 182
-- Data for Name: produtos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.produtos (pid, nome, descricao, estoque, preco, categoria_id) FROM stdin;
2	Produto de Teste	Pacote 100g	58963	1589.95	1
\.


--
-- TOC entry 2135 (class 0 OID 0)
-- Dependencies: 181
-- Name: produtos_categoria_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.produtos_categoria_id_seq', 1, false);


--
-- TOC entry 2136 (class 0 OID 0)
-- Dependencies: 180
-- Name: produtos_pid_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.produtos_pid_seq', 3, true);


--
-- TOC entry 2105 (class 0 OID 25629)
-- Dependencies: 179
-- Data for Name: tributos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tributos (tid, nome, descricao, valor_percentual, categoria_id) FROM stdin;
1	Tributo	Testando entidade.	0.99	1
\.


--
-- TOC entry 2137 (class 0 OID 0)
-- Dependencies: 178
-- Name: tributos_categoria_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tributos_categoria_id_seq', 1, false);


--
-- TOC entry 2138 (class 0 OID 0)
-- Dependencies: 177
-- Name: tributos_tid_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tributos_tid_seq', 2, true);


--
-- TOC entry 2100 (class 0 OID 25605)
-- Dependencies: 174
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.usuarios (uid, nome, email, senha, nivel, data_cadastro) FROM stdin;
1	Merc Admin	admin@merc.com	$2y$10$g/L//KIw0pzOa3y9EjlMMudRkfsboX17hk6o6VLUdOombBOGfubVm	Administrador	2020-01-01 00:00:00
5	Merc Operacional	op@merc.com	$2y$10$lIR82yydrCzf/CCvTQy71OPs7Q4EWKiJ64qlH4rqGfP6rEuMX.G02	Operador	2020-01-01 00:00:00
\.


--
-- TOC entry 2139 (class 0 OID 0)
-- Dependencies: 173
-- Name: usuarios_uid_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuarios_uid_seq', 7, true);


--
-- TOC entry 2114 (class 0 OID 25683)
-- Dependencies: 188
-- Data for Name: venda_produto; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.venda_produto (venda_id, produto_id, quantidade) FROM stdin;
\.


--
-- TOC entry 2140 (class 0 OID 0)
-- Dependencies: 187
-- Name: venda_produto_produto_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.venda_produto_produto_id_seq', 1, false);


--
-- TOC entry 2141 (class 0 OID 0)
-- Dependencies: 186
-- Name: venda_produto_venda_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.venda_produto_venda_id_seq', 1, false);


--
-- TOC entry 2111 (class 0 OID 25667)
-- Dependencies: 185
-- Data for Name: vendas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.vendas (vid, usuario_id, valor_produtos, valor_tributos, valor_total, data_registro) FROM stdin;
\.


--
-- TOC entry 2142 (class 0 OID 0)
-- Dependencies: 184
-- Name: vendas_usuario_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.vendas_usuario_id_seq', 1, false);


--
-- TOC entry 2143 (class 0 OID 0)
-- Dependencies: 183
-- Name: vendas_vid_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.vendas_vid_seq', 1, false);


--
-- TOC entry 1976 (class 2606 OID 25624)
-- Name: categorias_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.categorias
    ADD CONSTRAINT categorias_pkey PRIMARY KEY (cid);


--
-- TOC entry 1980 (class 2606 OID 25657)
-- Name: produtos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.produtos
    ADD CONSTRAINT produtos_pkey PRIMARY KEY (pid);


--
-- TOC entry 1978 (class 2606 OID 25638)
-- Name: tributos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.tributos
    ADD CONSTRAINT tributos_pkey PRIMARY KEY (tid);


--
-- TOC entry 1974 (class 2606 OID 25613)
-- Name: usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (uid);


--
-- TOC entry 1984 (class 2606 OID 25689)
-- Name: venda_produto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.venda_produto
    ADD CONSTRAINT venda_produto_pkey PRIMARY KEY (venda_id, produto_id);


--
-- TOC entry 1982 (class 2606 OID 25673)
-- Name: vendas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.vendas
    ADD CONSTRAINT vendas_pkey PRIMARY KEY (vid);


--
-- TOC entry 1986 (class 2606 OID 25658)
-- Name: fk_produto_categoria_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produtos
    ADD CONSTRAINT fk_produto_categoria_id FOREIGN KEY (categoria_id) REFERENCES public.categorias(cid);


--
-- TOC entry 1985 (class 2606 OID 25639)
-- Name: fk_tributo_categoria_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tributos
    ADD CONSTRAINT fk_tributo_categoria_id FOREIGN KEY (categoria_id) REFERENCES public.categorias(cid);


--
-- TOC entry 1989 (class 2606 OID 25695)
-- Name: fk_venda_produto_produto_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.venda_produto
    ADD CONSTRAINT fk_venda_produto_produto_id FOREIGN KEY (produto_id) REFERENCES public.produtos(pid);


--
-- TOC entry 1988 (class 2606 OID 25690)
-- Name: fk_venda_produto_venda_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.venda_produto
    ADD CONSTRAINT fk_venda_produto_venda_id FOREIGN KEY (venda_id) REFERENCES public.vendas(vid);


--
-- TOC entry 1987 (class 2606 OID 25674)
-- Name: fk_venda_usuario_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vendas
    ADD CONSTRAINT fk_venda_usuario_id FOREIGN KEY (usuario_id) REFERENCES public.usuarios(uid);


--
-- TOC entry 2122 (class 0 OID 0)
-- Dependencies: 6
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2020-01-09 06:35:36 -03

--
-- PostgreSQL database dump complete
--

