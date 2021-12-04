SELECT * FROM size as s JOIN chi_tiet_don_hang as ct ON s.S_MA = ct.CTDH_MA;

SELECT * FROM mau as m JOIN chi_tiet_don_hang as ct ON m.M_MA = ct.M_MA;

SELECT * FROM san_pham as sp JOIN chi_tiet_don_hang as ct ON sp.SP_MA = ct.SP_MA;