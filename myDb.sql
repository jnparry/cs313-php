--
-- PostgreSQL database dump
--

-- Dumped from database version 10.3 (Ubuntu 10.3-1.pgdg16.04+1)
-- Dumped by pg_dump version 10.4 (Ubuntu 10.4-1.pgdg16.04+1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

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
-- Name: bookshelves; Type: TABLE; Schema: public; Owner: uohqpljbknezzx
--

CREATE TABLE public.bookshelves (
    id integer NOT NULL,
    roomsid integer NOT NULL,
    isclean boolean NOT NULL,
    date date NOT NULL,
    shelvesid integer NOT NULL
);


ALTER TABLE public.bookshelves OWNER TO uohqpljbknezzx;

--
-- Name: bookshelves_id_seq; Type: SEQUENCE; Schema: public; Owner: uohqpljbknezzx
--

CREATE SEQUENCE public.bookshelves_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.bookshelves_id_seq OWNER TO uohqpljbknezzx;

--
-- Name: bookshelves_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: uohqpljbknezzx
--

ALTER SEQUENCE public.bookshelves_id_seq OWNED BY public.bookshelves.id;


--
-- Name: markers; Type: TABLE; Schema: public; Owner: uohqpljbknezzx
--

CREATE TABLE public.markers (
    id integer NOT NULL,
    name character varying(100) NOT NULL,
    projectsid integer NOT NULL,
    roomsid integer NOT NULL,
    bookshelvesid integer NOT NULL,
    shelvesid integer NOT NULL
);


ALTER TABLE public.markers OWNER TO uohqpljbknezzx;

--
-- Name: markers_id_seq; Type: SEQUENCE; Schema: public; Owner: uohqpljbknezzx
--

CREATE SEQUENCE public.markers_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.markers_id_seq OWNER TO uohqpljbknezzx;

--
-- Name: markers_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: uohqpljbknezzx
--

ALTER SEQUENCE public.markers_id_seq OWNED BY public.markers.id;


--
-- Name: projects; Type: TABLE; Schema: public; Owner: uohqpljbknezzx
--

CREATE TABLE public.projects (
    id integer NOT NULL,
    name character varying(100) NOT NULL,
    iscomplete boolean NOT NULL,
    date date NOT NULL
);


ALTER TABLE public.projects OWNER TO uohqpljbknezzx;

--
-- Name: projects_id_seq; Type: SEQUENCE; Schema: public; Owner: uohqpljbknezzx
--

CREATE SEQUENCE public.projects_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.projects_id_seq OWNER TO uohqpljbknezzx;

--
-- Name: projects_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: uohqpljbknezzx
--

ALTER SEQUENCE public.projects_id_seq OWNED BY public.projects.id;


--
-- Name: rooms; Type: TABLE; Schema: public; Owner: uohqpljbknezzx
--

CREATE TABLE public.rooms (
    id integer NOT NULL,
    name character varying(100) NOT NULL,
    projectsid integer NOT NULL,
    isclean boolean NOT NULL,
    date date NOT NULL
);


ALTER TABLE public.rooms OWNER TO uohqpljbknezzx;

--
-- Name: rooms_id_seq; Type: SEQUENCE; Schema: public; Owner: uohqpljbknezzx
--

CREATE SEQUENCE public.rooms_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.rooms_id_seq OWNER TO uohqpljbknezzx;

--
-- Name: rooms_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: uohqpljbknezzx
--

ALTER SEQUENCE public.rooms_id_seq OWNED BY public.rooms.id;


--
-- Name: shelves; Type: TABLE; Schema: public; Owner: uohqpljbknezzx
--

CREATE TABLE public.shelves (
    id integer NOT NULL,
    isclean boolean NOT NULL,
    date date NOT NULL
);


ALTER TABLE public.shelves OWNER TO uohqpljbknezzx;

--
-- Name: shelves_id_seq; Type: SEQUENCE; Schema: public; Owner: uohqpljbknezzx
--

CREATE SEQUENCE public.shelves_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.shelves_id_seq OWNER TO uohqpljbknezzx;

--
-- Name: shelves_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: uohqpljbknezzx
--

ALTER SEQUENCE public.shelves_id_seq OWNED BY public.shelves.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: uohqpljbknezzx
--

CREATE TABLE public.users (
    id integer NOT NULL,
    email character varying(20) NOT NULL,
    password character varying(100) NOT NULL,
    name character varying(100) NOT NULL
);


ALTER TABLE public.users OWNER TO uohqpljbknezzx;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: uohqpljbknezzx
--

CREATE SEQUENCE public.users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO uohqpljbknezzx;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: uohqpljbknezzx
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: bookshelves id; Type: DEFAULT; Schema: public; Owner: uohqpljbknezzx
--

ALTER TABLE ONLY public.bookshelves ALTER COLUMN id SET DEFAULT nextval('public.bookshelves_id_seq'::regclass);


--
-- Name: markers id; Type: DEFAULT; Schema: public; Owner: uohqpljbknezzx
--

ALTER TABLE ONLY public.markers ALTER COLUMN id SET DEFAULT nextval('public.markers_id_seq'::regclass);


--
-- Name: projects id; Type: DEFAULT; Schema: public; Owner: uohqpljbknezzx
--

ALTER TABLE ONLY public.projects ALTER COLUMN id SET DEFAULT nextval('public.projects_id_seq'::regclass);


--
-- Name: rooms id; Type: DEFAULT; Schema: public; Owner: uohqpljbknezzx
--

ALTER TABLE ONLY public.rooms ALTER COLUMN id SET DEFAULT nextval('public.rooms_id_seq'::regclass);


--
-- Name: shelves id; Type: DEFAULT; Schema: public; Owner: uohqpljbknezzx
--

ALTER TABLE ONLY public.shelves ALTER COLUMN id SET DEFAULT nextval('public.shelves_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: uohqpljbknezzx
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Data for Name: bookshelves; Type: TABLE DATA; Schema: public; Owner: uohqpljbknezzx
--

COPY public.bookshelves (id, roomsid, isclean, date, shelvesid) FROM stdin;
\.


--
-- Data for Name: markers; Type: TABLE DATA; Schema: public; Owner: uohqpljbknezzx
--

COPY public.markers (id, name, projectsid, roomsid, bookshelvesid, shelvesid) FROM stdin;
\.


--
-- Data for Name: projects; Type: TABLE DATA; Schema: public; Owner: uohqpljbknezzx
--

COPY public.projects (id, name, iscomplete, date) FROM stdin;
\.


--
-- Data for Name: rooms; Type: TABLE DATA; Schema: public; Owner: uohqpljbknezzx
--

COPY public.rooms (id, name, projectsid, isclean, date) FROM stdin;
\.


--
-- Data for Name: shelves; Type: TABLE DATA; Schema: public; Owner: uohqpljbknezzx
--

COPY public.shelves (id, isclean, date) FROM stdin;
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: uohqpljbknezzx
--

COPY public.users (id, email, password, name) FROM stdin;
\.


--
-- Name: bookshelves_id_seq; Type: SEQUENCE SET; Schema: public; Owner: uohqpljbknezzx
--

SELECT pg_catalog.setval('public.bookshelves_id_seq', 1, false);


--
-- Name: markers_id_seq; Type: SEQUENCE SET; Schema: public; Owner: uohqpljbknezzx
--

SELECT pg_catalog.setval('public.markers_id_seq', 1, false);


--
-- Name: projects_id_seq; Type: SEQUENCE SET; Schema: public; Owner: uohqpljbknezzx
--

SELECT pg_catalog.setval('public.projects_id_seq', 1, false);


--
-- Name: rooms_id_seq; Type: SEQUENCE SET; Schema: public; Owner: uohqpljbknezzx
--

SELECT pg_catalog.setval('public.rooms_id_seq', 1, false);


--
-- Name: shelves_id_seq; Type: SEQUENCE SET; Schema: public; Owner: uohqpljbknezzx
--

SELECT pg_catalog.setval('public.shelves_id_seq', 1, false);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: uohqpljbknezzx
--

SELECT pg_catalog.setval('public.users_id_seq', 1, false);


--
-- Name: bookshelves bookshelves_pkey; Type: CONSTRAINT; Schema: public; Owner: uohqpljbknezzx
--

ALTER TABLE ONLY public.bookshelves
    ADD CONSTRAINT bookshelves_pkey PRIMARY KEY (id);


--
-- Name: markers markers_name_key; Type: CONSTRAINT; Schema: public; Owner: uohqpljbknezzx
--

ALTER TABLE ONLY public.markers
    ADD CONSTRAINT markers_name_key UNIQUE (name);


--
-- Name: markers markers_pkey; Type: CONSTRAINT; Schema: public; Owner: uohqpljbknezzx
--

ALTER TABLE ONLY public.markers
    ADD CONSTRAINT markers_pkey PRIMARY KEY (id);


--
-- Name: projects projects_name_key; Type: CONSTRAINT; Schema: public; Owner: uohqpljbknezzx
--

ALTER TABLE ONLY public.projects
    ADD CONSTRAINT projects_name_key UNIQUE (name);


--
-- Name: projects projects_pkey; Type: CONSTRAINT; Schema: public; Owner: uohqpljbknezzx
--

ALTER TABLE ONLY public.projects
    ADD CONSTRAINT projects_pkey PRIMARY KEY (id);


--
-- Name: rooms rooms_name_key; Type: CONSTRAINT; Schema: public; Owner: uohqpljbknezzx
--

ALTER TABLE ONLY public.rooms
    ADD CONSTRAINT rooms_name_key UNIQUE (name);


--
-- Name: rooms rooms_pkey; Type: CONSTRAINT; Schema: public; Owner: uohqpljbknezzx
--

ALTER TABLE ONLY public.rooms
    ADD CONSTRAINT rooms_pkey PRIMARY KEY (id);


--
-- Name: shelves shelves_pkey; Type: CONSTRAINT; Schema: public; Owner: uohqpljbknezzx
--

ALTER TABLE ONLY public.shelves
    ADD CONSTRAINT shelves_pkey PRIMARY KEY (id);


--
-- Name: users users_email_key; Type: CONSTRAINT; Schema: public; Owner: uohqpljbknezzx
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_key UNIQUE (email);


--
-- Name: users users_name_key; Type: CONSTRAINT; Schema: public; Owner: uohqpljbknezzx
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_name_key UNIQUE (name);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: uohqpljbknezzx
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: bookshelves bookshelves_roomsid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: uohqpljbknezzx
--

ALTER TABLE ONLY public.bookshelves
    ADD CONSTRAINT bookshelves_roomsid_fkey FOREIGN KEY (roomsid) REFERENCES public.rooms(id);


--
-- Name: bookshelves bookshelves_shelvesid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: uohqpljbknezzx
--

ALTER TABLE ONLY public.bookshelves
    ADD CONSTRAINT bookshelves_shelvesid_fkey FOREIGN KEY (shelvesid) REFERENCES public.shelves(id);


--
-- Name: markers markers_bookshelvesid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: uohqpljbknezzx
--

ALTER TABLE ONLY public.markers
    ADD CONSTRAINT markers_bookshelvesid_fkey FOREIGN KEY (bookshelvesid) REFERENCES public.bookshelves(id);


--
-- Name: markers markers_projectsid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: uohqpljbknezzx
--

ALTER TABLE ONLY public.markers
    ADD CONSTRAINT markers_projectsid_fkey FOREIGN KEY (projectsid) REFERENCES public.projects(id);


--
-- Name: markers markers_roomsid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: uohqpljbknezzx
--

ALTER TABLE ONLY public.markers
    ADD CONSTRAINT markers_roomsid_fkey FOREIGN KEY (roomsid) REFERENCES public.rooms(id);


--
-- Name: markers markers_shelvesid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: uohqpljbknezzx
--

ALTER TABLE ONLY public.markers
    ADD CONSTRAINT markers_shelvesid_fkey FOREIGN KEY (shelvesid) REFERENCES public.shelves(id);


--
-- Name: rooms rooms_projectsid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: uohqpljbknezzx
--

ALTER TABLE ONLY public.rooms
    ADD CONSTRAINT rooms_projectsid_fkey FOREIGN KEY (projectsid) REFERENCES public.projects(id);


--
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: uohqpljbknezzx
--

REVOKE ALL ON SCHEMA public FROM postgres;
REVOKE ALL ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO uohqpljbknezzx;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- Name: LANGUAGE plpgsql; Type: ACL; Schema: -; Owner: postgres
--

GRANT ALL ON LANGUAGE plpgsql TO uohqpljbknezzx;


--
-- PostgreSQL database dump complete
--

