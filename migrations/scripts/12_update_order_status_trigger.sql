CREATE TRIGGER update_order_status_trigger
    BEFORE UPDATE ON orders
    FOR EACH ROW
EXECUTE FUNCTION update_order_status();