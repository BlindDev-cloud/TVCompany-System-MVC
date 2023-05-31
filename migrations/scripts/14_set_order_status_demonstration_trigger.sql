CREATE TRIGGER set_order_status_demonstration_trigger
    AFTER INSERT ON releases
    FOR EACH ROW
EXECUTE FUNCTION set_order_status_demonstration();