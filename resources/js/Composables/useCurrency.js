export function useCurrency() {
    const formatIDR = (value) => {
        if (value == null) return 'Rp 0';
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0,
        }).format(value);
    };

    return { formatIDR };
}
